<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePDCPrograms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type', 30);
            $table->string('sponsor', 30);
            $table->string('supporter', 30);
            $table->string('facilitator', 30)->nullable();
            $table->string('manager', 30);
            $table->string('for');
            $table->bigInteger('fund');
            $table->string('fund_type', 15);
            $table->boolean('fee_able');
            $table->bigInteger('fee')->nullable();
            $table->string('fee_type', 20)->nullable();
            $table->string('info_mobile_number');
            $table->longText('program_description');
            $table->bigInteger('participant_amount');
            $table->text('facilitator_code');
            $table->text('participant_code');

            // $table->string('');
            $table->string('start_date');
            $table->string('end_date');
            // $table->string('');
            // $table->string('start_month');
            // $table->string('end_month');

            // $table->integer('start_day');
            // $table->integer('end_day');

            // $table->string('start_time');
            // $table->string('end_time');

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
        Schema::dropIfExists('user_roles');
        Schema::dropIfExists('user_attendances');
        Schema::dropIfExists('user_payments');
        Schema::dropIfExists('user_infos');
        Schema::dropIfExists('programs');
    }
}
