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
        $this->middleware('auth');
    }

    public function changeCourseStatus($token)
    {
        $this->course->changeStatus($token);
        return redirect()->route("home");
    }

}
