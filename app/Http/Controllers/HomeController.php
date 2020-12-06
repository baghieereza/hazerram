<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use App\Models\School;
use App\Models\CourseTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\View\View|void
     */
    public function index()
    {

        if (Gate::allows('isTeacher')) {
            $course_times = CourseTime::with('course')->whereHas('course', function ($q) {
                $q->where('teacher_id', auth()->id());
            })->whereDate('start_date', '=', now()->toDate())->get();

            $now = Carbon::now();
            $start = $now->startOfWeek(Carbon::SATURDAY)->toDate();
            $end = $now->endOfWeek(Carbon::WEDNESDAY)->toDate();
            $week_course_times = CourseTime::with(['present','course'])->whereHas('course', function ($q) {
                $q->where('teacher_id', auth()->id());
            })->whereBetween('start_date', [
                $start,
                $end,
            ])->get();

            return view('users.teacher', compact('course_times', 'week_course_times'));
        }
        if (Gate::allows('isManager')) {
            $res = Course::with("students")->get();

            $course_times = DB::select("select level.name as level_name, course.*, course_time.*, school.*, class.*, course.id as course_id, course_time.status as course_time_status, course.name as course_name
                from course,level,course_time,school,class
                where course.level_id = level.id
                and course.id = course_time.course_id and class.id = course.class_id
                and school.id = class.school_id and school.manager_id = " . auth()->id() . "
                and school.status = 1 and course_time.start_date BETWEEN '" . now()->toDateString() . " 00:00:00" . "'
                and '" . now()->toDateString() . " 23:59:59" . "'");
            foreach ($course_times as $course_time)
            {
                foreach ($res as $item)
                {
                    if ($item->id == $course_time->course_id)
                        $course_time->student_count = $item->students->count();
                }
            }
            $now = Carbon::now();
            $start = $now->startOfWeek(Carbon::SATURDAY)->toDateTimeString();
            $end = $now->endOfWeek(Carbon::WEDNESDAY)->toDateTimeString();
           $d = $week_course_times_present = School::with('classes.course')->wherehas('classes.course', function ($q) {
               $q->where('course.id', 1);
           })->where('school.manager_id', auth()->id())->first();

           dd($d);


            $week_course_times = DB::select("select level.name as level_name, course.*, course_time.*, school.*, class.*, course.id as course_id,
                course_time.status as course_time_status, course.name as course_name, school.name as school_name
                from course,level,course_time,school,class
                where course.level_id = level.id
                and course.id = course_time.course_id and class.id = course.class_id
                and school.id = class.school_id and school.manager_id = " . auth()->id() . "
                and school.status = 1 and course_time.start_date BETWEEN '" . $start . "' and '" . $end . "'");
            return view('users.manager', compact('course_times','week_course_times','week_course_times_present'));
        }
        if (Gate::allows('isAdmin')) {
            $res = Course::with("students")->get();

            $course_times = DB::select("select level.name as level_name, course.*, course_time.*, school.*, class.*, course.id as course_id, 
                course_time.status as course_time_status, course.name as course_name
                from course,level,course_time,school,class
                where course.level_id = level.id
                and course.id = course_time.course_id and class.id = course.class_id
                and school.id = class.school_id 
                and school.status = 1 and course_time.start_date BETWEEN '" . now()->toDateString() . " 00:00:00" . "'
                and '" . now()->toDateString() . " 23:59:59" . "'");
            foreach ($course_times as $course_time)
            {
                foreach ($res as $item)
                {
                    if ($item->id == $course_time->course_id)
                        $course_time->student_count = $item->students->count();
                }
            }

            $schools = School::with(['manager' , 'classes.course.course_time.present'])->get();
            $teachers_count = User::where('role','teacher')->where('status',1)->count();

            return view('users.admin',compact('course_times', 'schools','teachers_count'));
        }
        if (Gate::allows('isStudent')) {

            $course_times = DB::select("select course.name, course.level_id, course.start_session, course.end_session, course.status as course_status, course_student.course_id, course_student.student_id
                                    ,course_time.start_date, course_time.status as course_time_status, level.name as level_name
                from course,course_student,level,course_time where course.level_id = level.id and course.id = course_time.course_id and course.id = course_student.course_id and course_student.id = " . auth()->id() . " and course_time.start_date BETWEEN '" . now()->toDateString() . " 00:00:00" . "' and '" . now()->toDateString() . " 23:59:59" . "'");

            $now = Carbon::now();
            $start = $now->startOfWeek(Carbon::SATURDAY)->toDateTimeString();
            $end = $now->endOfWeek(Carbon::WEDNESDAY)->toDateTimeString();
            $week_course_times = DB::select("select course.name, course.level_id, course.start_session, course.end_session, course.status as course_status, course_student.course_id, course_student.student_id
                                    ,course_time.start_date, course_time.status as course_time_status, level.name as level_name, course.class_id, class.school_id, school.name as school_name
                from course,course_student,course_time,level,class,school where school.id = class.school_id and level.id = course.level_id and class.id = course.class_id and course.id = course_time.course_id and course.id = course_student.course_id and course_student.student_id = " . auth()->id() . " and course_time.start_date BETWEEN '" . $start . "' and '" . $end . "'");

            return view('users.student', compact('week_course_times', 'course_times'));
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }

    public function course_time($id)
    {
        $course_time = CourseTime::with('course.classes.school')->where('id',$id)->first();
        return view('users.presentList',compact('course_time'));
    }
}
