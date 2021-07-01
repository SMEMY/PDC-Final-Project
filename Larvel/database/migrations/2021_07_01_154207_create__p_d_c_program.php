<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePDCProgram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_p_d_c_program', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);	
            $table->string('type', 30);	
            $table->string('sponsor', 30);	
            $table->string('supporter', 30);	
            $table->string('manager', 30);	
            $table->decimal('fund', 10, 5);	
            $table->string('fund_type', 15);
            $table->boolean('fee_able');	
            $table->decimal('fee', 10, 5);	
            $table->string('fee_type',20);	
            $table->longText('program_description');	
            $table->decimal('participant_amount', 5,0);
            $table->text('facilitator_code');	
            $table->text('participant_code');
            $table->unsignedInteger('address_id');	
            $table->foreign('address_id')->references('id')->on('_p_d_c_address')->onDelete('cascade');
            $table->unsignedInteger('time_id');	
            $table->foreign('time_id')->references('id')->on('_p_d_c_time')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_p_d_c_program');
    }
}
