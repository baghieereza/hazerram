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

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class,'student_id');
    }

    public function present_student()
    {
        return $this->hasMany(PresentStudent::class,'course_student_id','id');
    }
}
