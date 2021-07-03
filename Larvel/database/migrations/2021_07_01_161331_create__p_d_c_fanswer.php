<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePDCFanswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fanswers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('answer', 30);
            $table->unsignedInteger('question_id');
            $table->foreign('question_id')->references('id')->on('fquestionnaires')->onDelete('cascade');
           
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
        Schema::dropIfExists('fanswers');
    }
}
