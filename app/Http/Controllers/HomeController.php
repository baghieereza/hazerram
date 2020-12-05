<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Repository\courseTimeRepository;
use Carbon\Carbon;
use App\Models\CourseTime;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function index()
    {
        courseTimeRepository::RunCourse();

        if (Gate::allows('isTeacher')) {
              $course_times = CourseTime::with('course')->whereHas('course',function ($q){
                $q->where('teacher_id',auth()->id());
            })->whereDate('start_date','=',now()->toDate())->get();


            $now = Carbon::now();
            $start = $now->startOfWeek(Carbon::SATURDAY)->toDate();
            $end = $now->endOfWeek(Carbon::WEDNESDAY)->toDate();
            $week_course_times = CourseTime::with('course')->whereHas('course',function ($q){
                $q->where('teacher_id',auth()->id());
            })->whereBetween('start_date',[$start,$end])->get();



            return view('users.teacher',compact('course_times','week_course_times'));
        }
        if (Gate::allows('isManager')) {
            return view('users.manager');
        }
        if (Gate::allows('isAdmin')) {
            return view('users.admin');
        }
        if (Gate::allows('isStudent')) {

            $course_times = CourseTime::with('course')->whereHas('course',function ($q){
                $q->where('teacher_id',auth()->id());
            })->whereDate('start_date','=',now()->toDate())->get();


            $now = Carbon::now();
            $start = $now->startOfWeek(Carbon::SATURDAY)->toDate();
            $end = $now->endOfWeek(Carbon::WEDNESDAY)->toDate();
            $week_course_times = CourseTime::with('course')->whereHas('course',function ($q){
                $q->where('teacher_id',auth()->id());
            })->whereBetween('start_date',[$start,$end])->get();
            return view('users.student');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
