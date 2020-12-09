<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Push_subscriptions
 *
 * @package \App\Models
 */
class Push_subscriptions extends Model
{
    public $table = "push_subscriptions";

    protected $fillable = [
        'user_id', 'endpoint', 'public_key', 'auth_token', 'created_at', 'updated_at', 'subscribable_id', 'subscribable_type', 'content_encoding'
    ];


}
