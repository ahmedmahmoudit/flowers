<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterStoreDeliveryTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('store_delivery_times', function (Blueprint $table) {
            //
            $table->dropColumn('from');
            $table->dropColumn('to');
            $table->dropColumn('type');
            $table->integer('delivery_time_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('store_delivery_times', function (Blueprint $table) {
            //
            $table->time('from');
            $table->time('to');
            $table->integer('type');
            $table->dropColumn('delivery_time_id');
        });
    }
}
