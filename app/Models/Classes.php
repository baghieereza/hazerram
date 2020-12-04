<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'class';

    public function get_school()
    {
        return $this->belongsTo('App\School','school_id');
    }
}
