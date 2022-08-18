<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerloginandregistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customerloginandregistrations', function (Blueprint $table) {

          $table->increments('customer_id');
          $table->string('customer_name');
          $table->string('customer_email');
          $table->string('customer_districk');
          $table->string('customer_address');
          $table->string('customer_mobile_number');
          $table->string('customer_password');
          $table->string('customer_register_date');
          $table->string('customer_status')->default('1');
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
        Schema::dropIfExists('customerloginandregistrations');
    }
}
