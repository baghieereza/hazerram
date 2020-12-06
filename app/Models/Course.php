<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';

    public function course_time()
    {
        return $this->hasMany(CourseTime::class,'course_id','id');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level', 'level_id');
    }

    public function get_course_students()
    {
        return $this->hasMany('App\CourseStudent', 'course_id');
    }

    public function  classes()
    {
        return $this->belongsTo('App\Models\Classes', 'class_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_student', 'course_id', 'student_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id');
    }


}
