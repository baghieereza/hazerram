<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';


    protected $fillable = [
        'name', 'class_id', 'teacher_id', 'level_id', 'year_id', 'start_session', 'end_session', 'status'
    ];

    public function classes()
    {
        return $this->belongsTo('App\Models\Classes', 'class_id');
    }


    public function students()
    {
        return $this->belongsToMany(User::class, 'course_student', 'course_id', 'student_id');
    }

    public function teacher()
    {
        return $this->hasOne(User::class, 'id', 'teacher_id');
    }


}
