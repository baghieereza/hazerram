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


    public static function checkCourse()
    {
        $fiveMinuteAfter = helper::get5MinuteAfter();
        $courses = CourseTime::with("course")->get();
        if (count($courses) > 0) {
            foreach ($courses as $row) {
                if (date('Y-m-d H:i', strtotime($row->start_date)) == $fiveMinuteAfter && $row->course->status == 0) {
                    $token = courseRepository::saveCourseHashCode($row->course->id);
                    helper::sendSMS('teacher', $row->course->classes->name, $row->course->classes->school->name, route("changeCourseStatus") . "/" . $token, $row->course->teacher->mobile);
                    helper::smsLog($row->id, 'teacher');
                }
            }
        }
    }
}
