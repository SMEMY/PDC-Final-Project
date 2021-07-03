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
            $table->string('teacher_last_name');
            $table->string('university');
            $table->string('faculty');
            $table->string('department');
            $table->string('current_edicational_position');
            $table->string('achieving_edicational_position');
            $table->unsignedInteger('address_id');	
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->unsignedInteger('time_id');
            $table->foreign('time_id')->references('id')->on('times')->onDelete('cascade');

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
