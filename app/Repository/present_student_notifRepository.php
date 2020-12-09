<?php

namespace App\Repository;

use App\Models\Classes;
use App\Models\Course;
use App\Models\Present_student_notif;
use DateTime;

/**
 * Class classesRepository
 *
 * @package \App\Repository
 */
class present_student_notifRepository
{

    /**
     * get  all if status  is  starting
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function get()
    {
        return Present_student_notif::with("time")->where("status", config('globalVariable.starting'))->get();
    }

    /**
     * store
     *
     * @param $students
     * @param $start_time
     * @param $end_time
     * @param $pushCountPerMinute
     * @param $period
     * @param $id
     * @param $i
     *
     * @return mixed
     */
    public static function store($students, $start_time, $end_time, $pushCountPerMinute, $period, $id, $i)
    {

        if ($i == 1) {
            $status = config("globalVariable.starting");
        } else {
            $status = config("globalVariable.pause");
        }
        return Present_student_notif::create([
            'students_id' => implode(",", $students),
            'start' => $start_time,
            'end' => $end_time,
            'course_time_id' => $id,
            'notif_count_per_minute' => $pushCountPerMinute,
            'period' => $period,
            'status' => $status
        ]);
    }

    /**
     * @param $id
     * @param $usersToUnset
     *
     * @return mixed
     */
    public static function update($id, $usersToUnset)
    {
        $users = Present_student_notif::where("id", $id)->first();
        $users = explode(",", $users->students_id);
        foreach ($usersToUnset as $row) {
            if (($key = array_search($row, $users)) !== false) {
                unset($users[$key]);
            }
        }
        return Present_student_notif::where("id", $id)->update(['students_id' => implode(",", $users)]);
    }


    /**
     * @param $id
     *
     * @return mixed
     */
    public static function ChangeStatusToDone($id)
    {
        return Present_student_notif::where("id", $id)->update(['status' => config("globalVariable.done")]);
    }
}
