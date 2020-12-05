<?php

namespace App\Repository;

use App\Http\helper;
use App\Models\Course;
use App\Models\CourseTime;
use App\Models\Present_student_notif;
use App\Models\PresentTeacher;

/**
 * Class courseTimeRepository
 *
 * @package \App\Repository
 */
class courseTimeRepository
{


    /**
     * @param $id
     * @param $courseId
     *
     * @return mixed
     */
    public static function changeStatusToStarting($id, $courseId)
    {
        return CourseTime::where("id", $id)->where("course_id", $courseId)->update(["status" => config('globalVariable.starting')]);
    }


    /**
     * @param $token
     *
     * @return mixed
     */
    public function changeStatus($token)
    {
        $course_time = CourseTime::where("token", $token)->first();
        $course_time->status = config('globalVariable.accepted');
        $course_time->save();
        return presentTeacherRepository::store($course_time->id);
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
        CourseTime::where("course_id", $courseId)->update(["token" => $bytes]);
        return $bytes;
    }


    /**
     * @param $id
     * @param $courseId
     *
     * @return mixed
     */
    public static function changeStatusToPresenting($id, $courseId)
    {
        return CourseTime::where("id", $id)->where("course_id", $courseId)->update(["status" => config('globalVariable.presenting')]);
    }


    /**
     * @param $id
     *
     * @param $courseId
     *
     * @return mixed
     */
    public static function ChangeStatusToDoing($id, $courseId)
    {
        return CourseTime::where("id", $id)->where("course_id", $courseId)->update(["status" => config('globalVariable.doing')]);
    }


    /**
     * if all task is done course finished
     *
     * @param $course_time_Id
     *
     * @return bool
     */
    public static function checkFinishingCourseTime($course_time_Id)
    {
        $count = 0;
        $done = 0;
        $course_time = Present_student_notif::where("id", $course_time_Id)->get();
        foreach ($course_time as $value) {
            ++$count;
            if ($value->status == config("globalVariable.done")) {
                ++$done;
            }
        }
        if ($count == $done) {
            return CourseTime::where("id", $course_time_Id)->update(['status' => config("globalVariable.finish")]);
        }
        return false;
    }


    /**
     * @throws \Exception
     */
    public static function CheckCourseHasNotStarted()
    {
        $course_time = CourseTime::with(['course.classes.school.manager', 'course.teacher'])->get();
        foreach ($course_time as $row) {
            if (helper::addMinuteToTime($row->start_date, 5) < date('Y-m-d H:i') && $row->status == config("globalVariable.pause")) {
                $teacherName = $row->course->teacher->name . "-" . $row->course->teacher->family;
                $courseName = $row->course->name;
                $date = date('H:i', strtotime($row->end_date)) . "-" . date('H:i', strtotime($row->start_date));
                $managerNumber = $row->course->classes->school->manager->mobile;
                helper::sendSMS('managerWarning', $teacherName, $courseName, $date, $managerNumber);
                helper::smsLog($row->id, 'managerWarning');
            }
        }
    }
}
