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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('orderId');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('shippment_adress_id');
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->string('status')->default('received');
            $table->string('traking_number')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->foreign('shippment_adress_id')->references('id')->on('shippment_addresses');
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
};
