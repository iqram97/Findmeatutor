<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'tutor_id',
        'student_id',
        't_seen',
        's_seen'
    ];
}
