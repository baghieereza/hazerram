<?php

namespace App\Http\Controllers;

use App\Repository\courseRepository;
use App\Repository\courseTimeRepository;

/**
 * Class courseController
 *
 * @package \App\Http\Controllers
 */
class CourseController extends Controller
{
    public $course;

    /**
     * courseController constructor.
     *
     * @param \App\Repository\courseTimeRepository $courseTimeRepository
     */
    public function __construct(courseTimeRepository $courseTimeRepository)
    {
        $this->course = $courseTimeRepository;
    }

    /**
     * @param $token
     *
     * @param $teacher_id
     * @param $log_id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeCourseStatus($token,$teacher_id,$log_id)
    {
        $this->course->changeStatus($token,$teacher_id,$log_id);
         return redirect()->route("home");
    }

}
