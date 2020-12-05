<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresentTeacher extends Model
{
    protected $table = 'present_teacher';

    protected $fillable = [
        'course_time_id', 'is_present' , 'status'
    ];

}
