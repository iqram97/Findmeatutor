<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'name',
        'area_image',
        'status'
    ];

    public function getJobs()
    {
        return $this->hasMany(JobBoard::class,'city_id','id');
    }
}
