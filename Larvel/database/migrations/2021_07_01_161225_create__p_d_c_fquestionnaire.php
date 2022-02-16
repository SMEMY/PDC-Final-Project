<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePDCFquestionnaire extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fquestionnaires', function (Blueprint $table) {
            // $table->dropForeign('feedback_form_id');

            $table->increments('id');
            $table->string('question_category', 100);
            $table->longText('question');
            $table->unsignedInteger('feedback_form_id');
            $table->foreign('feedback_form_id')->references('id')->on('feedbacks')->onDelete('cascade');
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
        Schema::dropIfExists('feedbackanswers');
        Schema::dropIfExists('fquestionnaires');
    }
}
