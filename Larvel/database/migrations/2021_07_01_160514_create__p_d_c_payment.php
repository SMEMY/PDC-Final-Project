<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePDCPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_p_d_c_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('payment_amount', 10, 5);	
            $table->decimal('payment_discount', 10, 5);	
            $table->unsignedInteger('program_id');
            $table->foreign('program_id')->references('id')->on('_p_d_c_program')->onDelete('cascade');
            $table->unsignedInteger('participant_id');
            $table->foreign('participant_id')->references('id')->on('_p_d_c_facilitatorandparticipant')->onDelete('cascade');
            
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
        Schema::dropIfExists('_p_d_c_payment');
    }
}
