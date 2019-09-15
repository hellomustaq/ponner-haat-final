<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndependentCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('independent_coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coupon_code')->unique();
            $table->float('discount');
            $table->integer('max_uses')->unsigned();
            $table->integer('max_uses_user')->unsigned();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('independent_coupons');
    }
}
