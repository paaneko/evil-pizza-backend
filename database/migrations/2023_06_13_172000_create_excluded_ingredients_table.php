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
        Schema::create('excluded_ingredients', function (Blueprint $table) {
            $table->primary(['ingredient_id', 'order_product_id']);
            $table->foreignId('ingredient_id')->references('id')->on('ingredients');
            $table->foreignId('order_product_id')->references('id')->on('order_products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excluded_ingredients');
    }
};
