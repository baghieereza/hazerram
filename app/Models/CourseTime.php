<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTime extends Model
{
    protected $table = 'course_time';

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function present()
    {
        return $this->hasMany(PresentStudent::class , 'course_time_id' , 'id');
    }
}
