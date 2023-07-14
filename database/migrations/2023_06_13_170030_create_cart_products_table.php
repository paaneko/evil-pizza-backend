<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_cart_id')->references('id')->on('user_carts');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('dough_spec_id')->nullable()->references('id')->on('dough_specs');
            $table->foreignId('size_spec_id')->references('id')->on('size_specs');
            $table->unsignedSmallInteger('quantity');
            $table->unsignedSmallInteger('total_weight');
            $table->unsignedSmallInteger('total_price');
            $table->unsignedSmallInteger('discount_total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_products');
    }
};
