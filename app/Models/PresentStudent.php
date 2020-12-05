<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PresentStudent extends Model
{
    protected $table = 'present_student';

    protected $fillable = [
        'course_time_id', 'course_student_id', 'is_present', 'status'
    ];

}
