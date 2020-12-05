<?php

namespace App\Repository;

use App\Models\PresentTeacher;

/**
 * Class presentTeacher
 *
 * @package \App\Repository
 */
class presentTeacherRepository
{
    public static function store($course_time_id)
    {
        return PresentTeacher::create([   'course_time_id' => $course_time_id   ]);
    }
}
