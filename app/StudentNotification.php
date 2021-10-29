<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentNotification extends Model
{
    protected $fillable =[
        'user_id',
        'tutor_id',
        'job_id',
        'is_seen',
        'is_accept',
    ];
}
