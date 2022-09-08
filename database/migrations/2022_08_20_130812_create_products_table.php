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
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('category_id');
            $table->string('productname');
            $table->double('price');
            $table->integer('count');
            $table->integer('ordered_counter')->default(0);
            $table->text('description', 2000);
            $table->string('status')->default('published');
            $table->string('visiblity')->default('public');
            $table->string('tag')->nullable();
            $table->float('discount')->nullable();
            $table->string('main_photo');
            $table->string('photos', 2000)->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
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
