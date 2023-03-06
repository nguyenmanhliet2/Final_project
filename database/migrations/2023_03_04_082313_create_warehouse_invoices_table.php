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
        Schema::create('warehouse_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('hash')->nullable();   //hash
            $table->string('order_code')->nullable();
            $table->double('total_money')->nullable();
            $table->integer('total_amount')->nullable();
            $table->integer('status')->default(0); //tinh trang
            $table->integer('payment')->default(0); //hinh thuc thanh toan
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
        Schema::dropIfExists('warehouse_invoices');
    }
};
