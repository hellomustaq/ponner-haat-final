<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('mother_category_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('sub_category_id')->unsigned();
            $table->integer('manufactures_id')->unsigned()->nullable();
            $table->integer('quantity');
            $table->float('price_per_unit');
            $table->float('purchase_price')->nullable();
            $table->float('discount')->default(0);
            $table->float('vat')->default(0);
            $table->boolean('availability')->default(1);
            $table->longText('details')->nullable();
            $table->longText('specification')->nullable();
            $table->longText('warranty')->nullable();
            $table->boolean('active')->default(1);
            $table->longText('note')->nullable();

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
        Schema::dropIfExists('products');
    }
}
