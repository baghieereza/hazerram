<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'school';

    public function classes()
    {
        return $this->hasMany(Classes::class, 'school_id');
    }

    public function manager()
    {
        return $this->hasOne(User::class, "id", 'manager_id');
    }


}
