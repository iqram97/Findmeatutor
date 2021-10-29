<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'conversation_id',
        'message',
        'is_seen',
        'sender',
        'type'
    ];
}
