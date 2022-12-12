<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyBlockedOutDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blocked_out_dates', function (Blueprint $table) {
            $table->renameColumn('blocked_date', 'start')->nullable();
            $table->date('end')->after('blocked_date')->nullable();
            $table->string('display')->after('end')->default('background');
            $table->string('color')->after('display')->default('#ff9f89');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blocked_out_dates', function (Blueprint $table) {
            $table->renameColumn('start', 'blocked_date');
            $table->dropColumn('end');
            $table->dropColumn('display');
            $table->dropColumn('color');
        });
    }
}
