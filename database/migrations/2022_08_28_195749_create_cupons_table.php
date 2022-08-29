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
        Schema::create('cupons', function (Blueprint $table) {
            $table->id();
            $table->string('code', 25);
            $table->integer('max_limit', 0)->default(-1);
            $table->integer('count', 0)->default(0);
            $table->string('discount_type', 10)->default('percent');
            $table->float('discount')->default(0);
            $table->string('givento_name')->nullable();
            $table->string('givento_phone')->nullable();
            $table->timestamp('expire_at')->nullable();
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
        Schema::dropIfExists('cupons');
    }
};
