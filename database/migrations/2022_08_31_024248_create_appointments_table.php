<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('client_id')->references('id')->on('users');
            $table->foreignId('pet_id')->references('id')->on('pets');
            $table->foreignId('appointment_code')->references('id')->on('users');
            $table->foreignId('appointment_type_code')->references('id')->on('appointment_type');
            $table->string('symptoms');
            $table->dateTime('start');
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
        Schema::dropIfExists('appointments');
    }
}
