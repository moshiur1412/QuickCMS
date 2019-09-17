<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->string('customer_name');
            $table->string('phone_number');
            $table->string('address');
            $table->string('status');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
