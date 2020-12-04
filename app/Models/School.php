<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CourseTime
 *
 * @package \App\Models
 */
class School extends Model
{
    protected $table = 'school';
    protected $fillable = [
        'code', 'type_id', 'name', 'address', 'manager_id', 'createdAt', 'updatedAt', 'expireDate', 'status', 'city_id', 'school_type_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne(User::class, 'teacher_id', 'id');
    }

    public function city()
    {
        return $this->hasOne(User::class, 'teacher_id', 'id');
    }

    public function manager()
    {
        return $this->hasOne(User::class, 'teacher_id', 'id');
    }

}
