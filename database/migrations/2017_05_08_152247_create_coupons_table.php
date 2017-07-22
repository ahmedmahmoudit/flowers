<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('percentage');
            $table->string('code');
            $table->enum('active', [1, 0])->default(1);
            $table->integer('minimum_charge');
            $table->date('expiry_date')->default(\Carbon\Carbon::now()->addDays(30)->toDateString());
            $table->integer('quantity_left')->default(10000); //only for numbers time to use
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coupons');
    }
}
