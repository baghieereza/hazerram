<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseTime extends Model
{
    protected $table = 'course_time';

    public function get_course()
    {
        return $this->belongsTo('App\Course','course_id');
    }
}
