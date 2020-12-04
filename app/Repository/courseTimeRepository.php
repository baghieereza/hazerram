<?php

namespace App\Repository;

use App\Http\helper;
use App\Models\Course;

/**
 * Class courseTimeRepository
 *
 * @package \App\Repository
 */
class courseTimeRepository
{


    public function checkCourse()
    {

        $fiveMinuteAfter = helper::get5MinuteAfter();
        $courses = Course::with("teacher")->get();
        if (count($courses) > 0) {
            foreach ($courses as $cours) {
                if ($cours->start_session == $fiveMinuteAfter) {

                }
            }
        }
    }
}
