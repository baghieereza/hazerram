<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseStudent extends Model
{
    protected $table = 'course_student';


    protected $fillable = [
        'name', 'course_id', 'student_id', 'status',
    ];


    public function student()
    {
        return $this->belongsTo(User::class);
    }

}
