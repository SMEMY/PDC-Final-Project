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
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');	
            $table->string('type', 30);	
            $table->string('sponsor', 30);	
            $table->string('supporter', 30);	
            $table->string('manager', 30);	
            $table->decimal('fund', 10, 5);	
            $table->string('fund_type', 15);
            $table->boolean('fee_able');	
            $table->decimal('fee', 10, 5);	
            $table->string('fee_type',20);	
            $table->string('info_mobile_number');	
            $table->longText('program_description');	
            $table->decimal('participant_amount', 5,0);
            $table->text('facilitator_code');	
            $table->text('participant_code');
            $table->integer('end_day');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('start_time');
            $table->string('end_time');
            $table->integer('days_duration');
            $table->string('campus_name', 30);	
            $table->string('block_name', 30);
            $table->integer('block_number');	
            $table->integer('room_number');	
            // $table->unsignedInteger('address_id');	
            // $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            // $table->unsignedInteger('time_id');	
            // $table->foreign('time_id')->references('id')->on('times')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
