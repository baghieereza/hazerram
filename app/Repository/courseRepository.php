<?php

namespace App\Repository;

use App\Models\Classes;
use App\Models\Course;

/**
 * Class classesRepository
 *
 * @package \App\Repository
 */
class courseRepository
{

    public function changeStatus($token)
    {
        return Course::where("token", $token)->update(["status" => 1]);
    }

    public static function saveCourseHashCode($courseId)
    {
        $bytes = random_bytes(20);
        $bytes = bin2hex($bytes);
        Course::where("id", $courseId)->update(["token" => $bytes]);
        return $bytes;
    }
}
