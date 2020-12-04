<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Classes
 *
 * @package \App\Models
 */
class Classes extends Model
{

    protected $table = 'class';
    protected $fillable = [
        'name', 'school_id', 'code', 'level', 'status', 'expireDate'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function school()
    {
        return $this->hasOne(S::class, 'teacher_id', 'id');
    }
}
