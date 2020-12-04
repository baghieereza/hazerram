<?php

namespace App\Repository;

use App\Models\Classes;

/**
 * Class classesRepository
 *
 * @package \App\Repository
 */
class classesRepository
{

    public function changeStatus($class_id)
    {
        return Classes::where("id", $class_id)->update([  "status" => 1     ]);
    }
}
