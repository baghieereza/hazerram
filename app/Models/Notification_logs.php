<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification_logs extends Model
{
    protected $table = 'notification_logs';

    protected $fillable = [
       'expire_date', 'course_time_id','receiver_id',
    ];

}
