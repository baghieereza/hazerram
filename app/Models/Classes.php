<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'class';


    public function course()
    {
        return $this->hasMany(Course::class, 'class_id', 'id');
    }

    public function school()
    {
        return $this->belongsTo(School::class,'school_id');
    }
}
