<?php

namespace App\Http\Controllers;

use App\Repository\courseRepository;

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
     * @param \App\Repository\courseRepository $courseRepository
     */
    public function __construct(courseRepository $courseRepository)
    {
        $this->course = $courseRepository;
        $this->middleware('auth');
    }

    public function changeCourseStatus($token)
    {
        $this->course->changeStatus($token);
        return redirect()->route("home");
    }

}
