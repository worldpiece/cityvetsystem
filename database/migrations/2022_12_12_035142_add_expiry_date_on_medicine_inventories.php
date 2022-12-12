<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExpiryDateOnMedicineInventories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicine_inventories', function (Blueprint $table) {
            $table->date('expiry_date')->after('quantity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicine_inventories', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('quantity');
            $table->dropColumn('expiry_date');
        });
    }
}
