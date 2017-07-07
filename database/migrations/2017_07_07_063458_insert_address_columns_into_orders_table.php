<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertAddressColumnsIntoOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            $table->integer('country_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('block')->nullable();
            $table->string('street')->nullable();
            $table->string('house')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('recipient_firstname')->nullable();
            $table->string('recipient_lastname')->nullable();
            $table->string('recipient_mobile')->nullable();
            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('country_id');
            $table->dropColumn('area_id');
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('block');
            $table->dropColumn('street');
            $table->dropColumn('house');
            $table->dropColumn('mobile');
            $table->dropColumn('phone');
        });
    }
}
