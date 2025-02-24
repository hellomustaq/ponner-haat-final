<?php

use Illuminate\Support\Facades\Schema;
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
            $table->integer('order_statuses_id')->nullable();
            $table->longText('shipping_address');
            $table->string('altr_number')->nullable();
            $table->string('shipping_method');
            $table->string('payment_method');
            $table->string('coupon_code')->nullable();
            $table->string('total');
            $table->string('total_after_coupon');
            $table->string('total_after_shipping');
            $table->string('note')->nullable();
            $table->string('order_tracking_number')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
