<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('size_specs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')
                ->nullOnDelete();
            $table->string('name', 128);
            $table->unsignedInteger('extra_price');
            $table->unsignedInteger('extra_weight');
            $table->unsignedInteger('extra_toppings_price');
            $table->unsignedInteger('extra_toppings_weight_rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('size_specs');
    }
};
