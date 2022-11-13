<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOvertimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overtimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('employee_no')->on('staff');
            $table->dateTime('time_in');
            $table->dateTime('time_out');
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
        Schema::dropIfExists('overtimes');
    }
}
