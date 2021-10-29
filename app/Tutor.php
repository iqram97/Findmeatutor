<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tutor extends Authenticatable
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'address',
        'avatar',
        'email',
        'password',
        'role',
        'is_active',
    ];
}
