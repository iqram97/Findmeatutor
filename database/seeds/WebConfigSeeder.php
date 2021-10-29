<?php

use App\WebConfig;
use Illuminate\Database\Seeder;

class WebConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       WebConfig::create(
            [
                'website_phone'             => '+8801712345678',
                'website_email'             => 'info@findatutor.com',
                'website_facebook'          => '#',
                'website_twitter'           => '#',
                'website_linkedin'          => '#',
                'website_header_logo'       => '/frontEnd/images/logo.png',
                'website_footer_logo'       => '/frontEnd/images/logo.png',
                'website_copyright_text'    => 'Copyright © 2021, All Rights Reserved By Find A Tutor',
            ]
        );

    }
}
