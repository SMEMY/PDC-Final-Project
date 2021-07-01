<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePDCPphoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_p_d_c_pphoto', function (Blueprint $table) {
            $table->increments('id');
            $table->text('path');
            $table->unsignedInteger('program_id');	
            $table->foreign('program_id')->references('id')->on('_p_d_c_program')->onDelete('cascade');
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
        Schema::dropIfExists('_p_d_c_pphoto');
    }
}
