<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->float('price');
//            $table->integer('weight');
            $table->tinyInteger('is_sale');
            $table->float('sale_price')->nullable();
            $table->date('start_sale_date')->nullable();
            $table->date('end_sale_date')->nullable();
            $table->integer('quantity');
            $table->string('description_en');
            $table->string('description_ar');
            $table->string('main_image');
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
        Schema::drop('product_details');
    }
}
