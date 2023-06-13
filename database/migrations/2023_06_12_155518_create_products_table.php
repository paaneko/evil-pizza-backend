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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->foreignId('category_id')->references('id')->on('categories')
                ->nullOnDelete();
            $table->foreignId('sub_category_id')->references('id')->on('sub_categories')
                ->nullOnDelete();
            $table->integer('purchases_count');
            $table->unsignedInteger('old_price');
            $table->unsignedInteger('new_price')->nullable();
            $table->unsignedInteger('weight');
            $table->string('thumbnail', 255);
            $table->string('slug', 128);
            $table->boolean('is_visible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
