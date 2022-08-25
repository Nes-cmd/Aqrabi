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
        Schema::create('supplier_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->string('contact_name');
            $table->string('country');
            $table->string('city_name');
            $table->string('state')->nullable();
            $table->string('posta_number')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('adress_line1');
            $table->string('adress_line2')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
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
        Schema::dropIfExists('supplier_addresses');
    }
};
