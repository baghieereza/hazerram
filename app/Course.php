<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';

    public function get_course_time()
    {
        return $this->hasMany('App\CourseTime','course_id');
    }

    public function get_level()
    {
        return $this->belongsTo('App\Level','level_id');
    }

    public function get_course_students()
    {
        return $this->hasMany('App\CourseStudent','course_id');
    }

    public function get_class()
    {
        return $this->belongsTo('App\Classes','class_id');
    }

    public function get_students()
    {
        return $this->belongsToMany('App\User')->using('App\CourseStudent');
    }
}
