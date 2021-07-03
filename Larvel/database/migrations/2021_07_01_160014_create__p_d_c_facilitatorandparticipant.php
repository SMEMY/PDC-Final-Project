<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePDCFacilitatorandparticipant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilitatorsandparticipants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);	
            $table->string('last_name', 30);	
            $table->string('phone_number', 30);	
            $table->string('email', 50);	
            $table->binary('gender');	
            $table->string('affice_campus', 30);	
            $table->string('office_building', 30);
            $table->string('office_department', 30);
            $table->string('office_position', 30);
            $table->string('office_position_category', 30);
            $table->string('role_in_program', 30);
            $table->string('password');
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
        Schema::dropIfExists('facilitatorsandparticipants');
    }
}
