<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
          $table->increments('order_details_id');
          $table->string('my_order_id');
          $table->string('my_product_id');
          $table->string('my_product_name');
          $table->string('my_product_price');
          $table->string('my_product_image');
          $table->string('my_product_size');
          $table->string('my_product_color');
          $table->string('my_product_quantity');
          $table->string('my_order_total');
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
        Schema::dropIfExists('orderdetails');
    }
}
