<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CartProduct extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'total_price', 'product_id', 'size_spec_id', 'dough_spec_id'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function size_spec(): BelongsTo
    {
        return $this->belongsTo(SizeSpec::class);
    }

    public function dough_spec(): BelongsTo
    {
        return $this->belongsTo(DoughSpec::class);
    }

    public function excluded_ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'excluded_ingredients', 'cart_product_id', 'ingredient_id');
    }

    public function toppings(): BelongsToMany
    {
        return $this->belongsToMany(Topping::class, 'order_product_toppings', 'cart_product_id', 'topping_id');
    }
}
