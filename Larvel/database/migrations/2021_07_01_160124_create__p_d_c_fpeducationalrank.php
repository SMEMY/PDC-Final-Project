<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePDCFpeducationalrank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fpeducationalranks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('educational_rank', 30);
            $table->unsignedInteger('p_f_id');	
            $table->foreign('p_f_id')->references('id')->on('facilitatorsandparticipants')->onDelete('cascade');
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
        Schema::dropIfExists('fpeducationalranks');
    }
}
