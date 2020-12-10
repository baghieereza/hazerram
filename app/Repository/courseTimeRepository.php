<?php

namespace App\Repository;

use App\Http\helper;
use App\Models\Course;
use App\Models\CourseTime;
use App\Models\Notification_logs;
use App\Models\Present_student_notif;
use App\Models\PresentTeacher;
use App\Models\Sms_logs;
use App\Models\User;
use App\Notifications\PushToManager;
use App\Notifications\PushToStudent;
use Illuminate\Support\Facades\Auth;
use Notification;

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
     * @param $teacher_id
     * @param $log_id
     *
     * @return mixed
     */
    public function changeStatus($token, $teacher_id, $log_id)
    {
        $log = Notification_logs::find($log_id);
        if ($log) {

            if ($log->expire_date < date("Y-m-d H:m:i")) {
                return ["success" => false, "msg" => "لینک منقضی شده است !"];
            }
            Auth::loginUsingId($teacher_id, true);
            $course_time = CourseTime::where("token", $token)->first();
            $course_time->status = config('globalVariable.accepted');
            $course_time->save();
            return presentTeacherRepository::store($course_time->id);
        }
        return ["success" => false, "msg" => " اطلاعات ارسال شده صحیح نمیباشد"];

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
//        $fakeToekn = 'jhfsyifkhfjasghfgsd456g322354423sfsfsfdjisudfy';
        $course_time = CourseTime::with(['course.classes.school.manager', 'course.teacher'])->get();
        foreach ($course_time as $row) {
            if (helper::addMinuteToTime($row->start_date, 5) < date('Y-m-d H:i') && $row->status == config("globalVariable.pause")) {
                $teacherName = $row->course->teacher->name . "-" . $row->course->teacher->family;
                $courseName = $row->course->name;
                $managerNumber = $row->course->classes->school->manager->mobile;
                Notification::send(User::all(), new PushToManager($courseName, $teacherName, $row->start_date, $row->end_date, $managerNumber));
//                helper::sendSMS('managerWarning', $teacherName, $courseName, $date, $managerNumber);
//                helper::smsLog($row->id, 'managerWarning', $fakeToekn, $row->course->classes->school->manager->id);
            }
        }
    }
}
