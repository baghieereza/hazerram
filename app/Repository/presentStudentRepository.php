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
}
