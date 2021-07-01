<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePDCPfacility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_p_d_c_pfacility', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('facility');
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
        Schema::dropIfExists('_p_d_c_pfacility');
    }
}
