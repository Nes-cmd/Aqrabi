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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id', 0);
            $table->string('payment_method');
            $table->string('currency')->default('USD');
            $table->double('price')->default(0.0);
            $table->float('tax')->default(0.0);
            $table->float('vat')->default(0);
            $table->string('payer_id');
            $table->float('payment_fee')->default(0.0);
            $table->string('payer_email');
            $table->float('exchange_rate')->default(1);
            $table->double('total')->default(0);
            $table->string('status')->default('0');
            $table->string('transaction_id')->nullable();
            $table->text('other_info', 2000)->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
