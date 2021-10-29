<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebConfig extends Model
{
    protected $fillable = [
        'website_phone',
        'website_email',
        'website_facebook',
        'website_twitter',
        'website_linkedin',
        'website_header_logo',
        'website_footer_logo',
        'website_copyright_text',
    ];
}
