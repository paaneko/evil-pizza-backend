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
        Schema::table('cart_products', function (Blueprint $table) {
            $table->dropColumn(['total_weight', 'total_price', 'discount_total_price']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart_products', function (Blueprint $table) {
            $table->unsignedSmallInteger('total_weight');
            $table->unsignedSmallInteger('total_price');
            $table->unsignedSmallInteger('discount_total_price');
        });
    }
};
