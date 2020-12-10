<?php

namespace App\Repository;

use App\Models\PresentStudent;

/**
 * Class presentStudentRepository
 *
 * @package \App\Repository
 */
class presentStudentRepository
{

    public static function store($time, $users_id)
    {
        foreach ($users_id as $user) {
            PresentStudent::create([
                'course_time_id' => $time->id,
                'course_student_id' => $user,
            ]);
        }

        return true;
    }

    /**
     * set user to present mode
     * @param $id
     * @param $start
     * @param $end
     *
     * @return mixed
     */
    public static function modify($id, $start, $end)
    {
        return PresentStudent::where("course_student_id", $id)->where("created_at", ">=", $start)->where("created_at", "<=", $end)->update([
            'is_present' => 1
        ]);
    }
}
