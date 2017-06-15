<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('coupon_id')->unsigned()->nullable();
            $table->foreign('coupon_id')->references('id')->on('coupons');
            $table->integer('coupon_value')->default(0);
            $table->integer('sale_amount');
            $table->integer('net_amount');
            $table->string('payment_method');
            $table->tinyInteger('order_status');
            $table->tinyInteger('captured_status');
            $table->string('invoice_id');
            $table->string('order_email')->nullable();
            $table->text('order_address')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('delivery_time')->nullable();
            $table->string('reference_code')->nullable();

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
        Schema::drop('orders');
    }
}
