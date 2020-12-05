<?php

namespace App\jobs;

use App\Repository\courseTimeRepository;

/**
 * Class teacher
 *
 * @package \App\jobs
 */
class teacher
{

    public $course;

    /**
     * teacher constructor.
     *
     * @param \App\Repository\courseTimeRepository $courseTimeRepository
     */
    public function __construct(courseTimeRepository $courseTimeRepository)
    {
        $this->course = $courseTimeRepository;
    }

    public function sendSMS()
    {
        return $this->course->checkCourse();
    }

}
