<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobBoard extends Model
{
    protected $fillable = [
        'user_id',
        'tuition_type',
        'tuition_type_name',
        'institute_name',
        'city_id',
        'city_name',
        'no_of_student',
        'address',
        'no_of_days',
        'category_id',
        'category_name',
        'tutoring_time',
        'class_course',
        'hire_date',
        'subject',
        'salary',
        'gender',
        'gender_pref',
        'more_requirement',
        'status',
    ];


}
