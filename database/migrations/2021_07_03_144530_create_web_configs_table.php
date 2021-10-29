<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('website_phone')->nullable();
            $table->string('website_email')->nullable();
            $table->string('website_facebook')->nullable();
            $table->string('website_twitter')->nullable();
            $table->string('website_linkedin')->nullable();
            $table->text('website_header_logo')->nullable();
            $table->text('website_footer_logo')->nullable();
            $table->text('website_copyright_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('web_configs');
    }
}
