<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('cart_id',20)->unique();
            $table->string('order_id',20)->nullable();
            $table->string('customer_id',20);
            $table->string('product_id',20);
            $table->string('restaurant_name',50);
            $table->string('receving_status',5)->nullable();
            $table->string('customer_status',5)->nullable();
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
        Schema::dropIfExists('order');
    }
}
