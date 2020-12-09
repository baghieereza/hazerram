<?php

namespace App\Repository;

use App\Http\helper;
use App\Models\CourseTime;
use App\Models\User;
use App\Notifications\PushDemo;
use Notification;

/**
 * Class scheduleRepository
 *
 * @package \App\Repository
 */
class scheduleRepository
{
    /**
     * check course to send sms to teacher
     *
     * @throws \Exception
     */
    public static function CheckCourse()
    {
        $fiveMinuteAfter = helper::get5MinuteAfter();
        $courses = CourseTime::with("course")->get();
        if (count($courses) > 0) {
            foreach ($courses as $row) {
                 if (date('Y-m-d H:i', strtotime($row->start_date)) == $fiveMinuteAfter && $row->status == config('globalVariable.pause')) {
                    $token = courseTimeRepository::saveCourseHashCode($row->course_id);
                    helper::sendSMS('teacher', $row->course->classes->name, $row->course->classes->school->name, route("changeCourseStatus") . "/" . $token, $row->course->teacher->mobile);
                    helper::smsLog($row->course_id, 'teacher', $token, $row->course->teacher_id);
                    presentTeacherRepository::store($row->id);
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
                if (date('Y-m-d H:i', strtotime($row->start_date)) == $fiveMinuteEarlier && $row->status == config('globalVariable.accepted')) {
                    courseTimeRepository::changeStatusToStarting($row->id, $row->course_id);
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

        $courses = CourseTime::with("course")->get();
        if (count($courses) > 0) {
            foreach ($courses as $row) {
                if ($row->status == config('globalVariable.starting')) {
                    courseTimeRepository::ChangeStatusToDoing($row->id, $row->course_id);
                    courseRepository::GetStudents($row->id);
                }
            }
        }
    }

    /**
     * task to send notification
     */
    public static function SendNotification()
    {
        $notifications = present_student_notifRepository::get();
        foreach ($notifications as $notif) {
            $users = explode(",", $notif->students_id);
             if (count($users) > 0 &&  $notif->students_id <> "") {
                $usersToPush = helper::getUsersPerMinuteToPushNotification($users, $notif->notif_count_per_minute);
                Notification::send(User::whereIn("id", $usersToPush)->get(), new PushDemo);
                present_student_notifRepository::update($notif->id, $usersToPush);
                presentStudentRepository::store($notif->time, $usersToPush);
            } else {
                present_student_notifRepository::ChangeStatusToDone($notif->id);
                courseTimeRepository::checkFinishingCourseTime($notif->course_time_id);
            }
        }
    }

    /**
     * check if course not started send sms to manager
     * @throws \Exception
     */
    public static function CheckCourseHasNotStarted()
    {
        courseTimeRepository::CheckCourseHasNotStarted();
    }
}
