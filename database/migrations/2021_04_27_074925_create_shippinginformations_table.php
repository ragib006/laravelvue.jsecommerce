<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippinginformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippinginformations', function (Blueprint $table) {
          $table->increments('shipping_id');
          $table->string('shipping_name');
          $table->string('shipping_email');
          $table->string('shipping_districk');
          $table->string('shipping_address');
          $table->string('shipping_mobile_number');
          $table->string('shipping_added_date');
          $table->string('shipping_status')->default('1');



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
        Schema::dropIfExists('shippinginformations');
    }
}
