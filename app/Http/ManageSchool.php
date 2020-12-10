<?php

namespace App\Http;

use App\Year;
use Carbon\Carbon;
use App\Models\User;
use App\Models\School;
use App\Models\Course;
use App\Models\Classes;
use App\Models\CourseTime;
use App\Models\CourseStudent;

class ManageSchool
{
    private School $school;

    private Classes $class;

    private Course $course;

    private CourseTime $course_time;

    private CourseStudent $course_student;

    private User $user;

    private $year;

    public function __construct()
    {
        $this->school = new School();
        $this->class = new Classes();
        $this->course = new Course();
        $this->course_time = new CourseTime();
        $this->course_student = new CourseStudent();
        $this->user = new User();
        $this->year = new Year();
    }

    public function StudentToCourse($student_id, $course_id): bool
    {
        $this->course_student->student_id = $student_id;
        $this->course_student->course_id = $course_id;

        return $this->course_student->save();
    }

    public function SetCoursePerYear($course_id)
    {
        $course = $this->course->find($course_id);
        for ($i = 0; $i < 72; $i++) {
            if ($i == 0) {
                $this->course_time->course_id = $course_id;
                $this->course_time->start_date = $course->start_session;
                $this->course_time->end_date = $course->end_session;
                $this->course_time->save();
            } else {
                $this->course_time->course_id = $course_id;
                $this->course_time->start_date = Carbon::parse($course->start_session)->addWeek(1);
                $this->course_time->end_date = Carbon::parse($course->end_session)->addWeek(1);
                $this->course_time->save();
            }
        }
    }
}