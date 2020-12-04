<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CourseTime
 *
 * @package \App\Models
 */
class Course extends Model
{

    protected $table = 'course';
    protected $fillable = [
        'name', 'class_id', 'teacher_id', 'level_id', 'year_id', 'start_session', 'end_session', 'status',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teacher()
    {
        return $this->hasOne(User::class, 'teacher_id', 'id');
    }



}
