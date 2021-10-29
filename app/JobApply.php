<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{
    protected $fillable = [
        'job_id','tutor_id'
    ];
}
