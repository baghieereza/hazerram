<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';


    protected $fillable = [
        'name', 'class_id', 'teacher_id', 'level_id','year_id', 'start_session', 'end_session', 'status','token'
    ];







    public function get_course_time()
    {
        return $this->hasMany('App\CourseTime', 'course_id');
    }

    public function get_level()
    {
        return $this->belongsTo('App\Level', 'level_id');
    }

    public function get_course_students()
    {
        return $this->hasMany('App\CourseStudent', 'course_id');
    }

    public function classes()
    {
        return $this->belongsTo('App\Models\Classes', 'class_id');
    }

    public function students()

    {
        return $this->belongsToMany(User::class, CourseStudent::class, 'course_id', 'id');
    }

    public function teacher()
    {
        return $this->hasOne(User::class, 'id', 'teacher_id');
    }


}
