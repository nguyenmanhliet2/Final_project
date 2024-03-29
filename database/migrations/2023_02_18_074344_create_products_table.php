<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name_product');
            $table->string('slug_product');
            $table->integer('id_product_catalog');
            $table->longText('description_product');
            $table->integer('price_product');
            $table->integer('sales_price_product');
            $table->boolean('status_product'); // is_open
            $table->string('image_product');
            $table->integer('quantity_product')->default(1);
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
};
