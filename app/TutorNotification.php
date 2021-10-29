<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutorNotification extends Model
{
    protected $fillable =[
        'user_id',
        'job_id',
        'student_id',
        'is_seen',
    ];
}
