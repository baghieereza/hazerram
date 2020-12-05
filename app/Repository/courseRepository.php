<?php

namespace App\Repository;

use App\Http\helper;
use App\Models\Classes;
use App\Models\Course;
use App\Models\CourseTime;
use DateTime;
use Ramsey\Uuid\Type\Integer;

/**
 * Class classesRepository
 *
 * @package \App\Repository
 */
class courseRepository
{

    /**
     * @param $id
     *
     * @throws \Exception
     */
    public static function GetStudents($id)
    {
        $course_student = CourseTime::where('id', $id)->with('course')->first();
        $isPresentCount = rand(config('globalVariable.minimumCount'), config('globalVariable.maximumCount'));
        $start = strtotime($course_student->start_date);
        $end = strtotime($course_student->end_date);
        $estimatePerMinute = ($end - $start) / 60;
        $estimatePerMinute = round($estimatePerMinute / $isPresentCount);
        $users_id = courseRepository::GetStudentsID($course_student->course_id);

        if ($estimatePerMinute > count($users_id)) {
            $pushCountPerMinute = 1;
        } else {
            $div = (1 / ($estimatePerMinute / count($users_id)));
            $pushCountPerMinute = $div;
        }
        for ($i = 1; $i <= $isPresentCount; $i++) {

            if ($i == 1) {
                $start_time = $course_student->start_date;
            } else {
                $start_time = helper::addMinuteToTime($course_student->start_date, $estimatePerMinute * ($i - 1));
            }
            $end_time = helper::addMinuteToTime($course_student->start_date, ($estimatePerMinute * $i));

            present_student_notifRepository::store($users_id, $start_time, $end_time, $pushCountPerMinute, $estimatePerMinute, $course_student->id , $i);
        }
        courseTimeRepository::changeStatusToPresenting($course_student->id, $course_student->course_id);


    }

    /**
     * get students id
     *
     * @param $courseId
     *
     * @return array
     */
    public static function GetStudentsID($courseId)
    {
        $course = Course::where("course.id", $courseId)->with('students')->first();
        $student_id = [];
        foreach ($course->students as $row) {
            if ($row->status == config("globalVariable.active"))
                $student_id[] = $row->id;
        }

        return $student_id;
    }


}
