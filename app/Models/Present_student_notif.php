<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Present_student_notif
 *
 * @package \App\Models
 */
class Present_student_notif extends Model
{
    protected $table = 'present_student_notif';


    protected $fillable = [
        'name', 'students_id', 'status', 'start', 'end', 'period', 'course_time_id', 'notif_count_per_minute'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function time()
    {
        return $this->belongsTo(CourseTime::class, 'id', 'course_time_id');
    }

}
