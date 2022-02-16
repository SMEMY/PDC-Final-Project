<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePDCEduprogram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eduprograms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic');
            $table->string('type');
            $table->string('teacher_name');
            $table->string('father_name');
            $table->string('teacher_last_name');
            $table->string('university');
            $table->string('faculty');
            $table->string('department');
            $table->string('current_educational_position');
            $table->string('achieving_educational_position');
            $table->integer('participant_amount');
            $table->string('date');
            // $table->integer('month');
            // $table->integer('start_day');
            // $table->string('start_time');
            $table->string('campus_name', 30);	
            $table->string('block_name', 30);
            $table->integer('block_number');	
            $table->integer('room_number');	
            // $table->unsignedInteger('address_id');	
            // $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            // $table->unsignedInteger('time_id');
            // $table->foreign('time_id')->references('id')->on('times')->onDelete('cascade');

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
        Schema::dropIfExists('eduprograms');
    }
}
