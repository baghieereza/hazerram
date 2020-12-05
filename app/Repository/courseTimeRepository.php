<?php

namespace App\Repository;

use App\Http\helper;
use App\Models\Course;
use App\Models\CourseTime;

/**
 * Class courseTimeRepository
 *
 * @package \App\Repository
 */
class courseTimeRepository
{


    /**
     * check course to send sms to teacher
     * @throws \Exception
     */
    public static function CheckCourse()
    {
        $fiveMinuteAfter = helper::get5MinuteAfter();
        $courses = CourseTime::with("course")->get();
        if (count($courses) > 0) {
            foreach ($courses as $row) {
                if (date('Y-m-d H:i', strtotime($row->start_date)) == $fiveMinuteAfter && $row->course->status == config('globalVariable.pause')) {
                    $token = courseRepository::saveCourseHashCode($row->course_id);
                    helper::sendSMS('teacher', $row->course->classes->name, $row->course->classes->school->name, route("changeCourseStatus") . "/" . $token, $row->course->teacher->mobile);
                    helper::smsLog($row->course_id, 'teacher');
                }
            }
        }
    }

    /**
     * change status course to starting
     *
     * @throws \Exception
     */
    public static function StartCourse()
    {
        $fiveMinuteEarlier = helper::get5MinuteEarlier();
        $courses = CourseTime::with("course")->get();
        if (count($courses) > 0) {
            foreach ($courses as $row) {
                if (date('Y-m-d H:i', strtotime($row->start_date)) == $fiveMinuteEarlier && $row->course->status == config('globalVariable.accepted')) {
                    courseRepository::changeStatusToStarting($row->course_id);
                }
            }
        }
    }

    /**
     * change status to doing and send notification
     *
     * @throws \Exception
     */
    public static function RunCourse()
    {
        $fiveMinuteEarlier = helper::get5MinuteEarlier();
        $courses = CourseTime::with("course")->get();
        if (count($courses) > 0) {
            foreach ($courses as $row) {

                 if ($row->course->status == config('globalVariable.starting')) {

//                    courseRepository::ChangeStatusToDoing($row->course_id);
                    courseRepository::GetStudents($row->course_id);

                }
            }
        }
    }
}
