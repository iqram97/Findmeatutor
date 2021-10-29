<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_boards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('tuition_type')->unsigned();
            $table->string('tuition_type_name');
            $table->string('institute_name')->nullable();
            $table->string('city_id');
            $table->string('city_name')->nullable();
            $table->integer('no_of_student');
            $table->string('address');
            $table->string('no_of_days')->nullable();
            $table->integer('category_id');
            $table->string('category_name')->nullable();
            $table->string('tutoring_time')->nullable();
            $table->string('class_course');
            $table->timestamp('hire_date');
            $table->string('subject');
            $table->double('salary');
            $table->string('gender');
            $table->string('gender_pref');
            $table->text('more_requirement')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 = pending, 1 = live, 2 = canceled, 3 = appointed');
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
        Schema::dropIfExists('job_boards');
    }
}
