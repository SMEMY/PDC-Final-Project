<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FeedbackComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbackcomments', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('comment')->nullable();
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
        //
        Schema::dropIfExists('feedbackcomments');
    }
}
