<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_attendances', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedBigInteger('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            // $table->unsignedBigInteger('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->unsignedBigInteger('program_id');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->integer('total_days')->nullable();
            $table->integer('presence_days')->nullable();
            $table->integer('absence_days')->nullable();

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
        Schema::dropIfExists('user_attandances');
    }
}
