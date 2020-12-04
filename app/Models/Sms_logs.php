<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sms_logs extends Model
{
    protected $table = 'sms_logs';

    protected $fillable = [
       'course_id', 'text', 'date',
    ];

}
