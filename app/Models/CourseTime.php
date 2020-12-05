<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTime extends Model
{
    protected $table = 'course_time';

    protected $fillable = [
        'course_id', 'start_date', 'end_date', 'status', 'token'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
