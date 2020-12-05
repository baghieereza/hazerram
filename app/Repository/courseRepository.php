<?php

namespace App\Repository;

use App\Models\Classes;
use App\Models\Course;
use DateTime;

/**
 * Class classesRepository
 *
 * @package \App\Repository
 */
class courseRepository
{

    /**
     * @param $token
     *
     * @return mixed
     */
    public function changeStatus($token)
    {
        return Course::where("token", $token)->update(["status" => config('globalVariable.accepted')]);
    }

    /**
     * @param $courseId
     *
     * @return string
     * @throws \Exception
     */
    public static function saveCourseHashCode($courseId)
    {
        $bytes = random_bytes(20);
        $bytes = bin2hex($bytes);
        Course::where("id", $courseId)->update(["token" => $bytes]);
        return $bytes;
    }


    /**
     * @param $courseId
     *
     * @return mixed
     */
    public static function changeStatusToStarting($courseId)
    {
        return Course::where("id", $courseId)->update(["status" => config('globalVariable.starting')]);
    }


    /**
     * @param $id
     */
    public static function GetStudents($id)
    {
        $course_student = Course::where('course.id', $id)->with('students')->first();
        $isPresentCount = rand(config('globalVariable.minimumCount'), config('globalVariable.maximumCount'));
        $start = strtotime($course_student->start_session);
        $end = strtotime($course_student->end_session);
        $estimatePerMinute = ($end - $start) / 60;
        $estimatePerMinute = $estimatePerMinute - config("globalVariable.timeLimit");
        dd($estimatePerMinute / $isPresentCount);
    }

    public static function ChangeStatusToDoing($id)
    {
        return Course::where("id", $id)->update(["status" => config('globalVariable.doing')]);
    }
}
