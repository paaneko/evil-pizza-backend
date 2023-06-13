<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = 'quantity';

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }

    public function size_spec(): HasOne
    {
        return $this->hasOne(SizeSpec::class);
    }

    public function dough_spec(): HasOne
    {
        return $this->hasOne(DoughSpec::class);
    }

    public function excluded_ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'excluded_ingredients', 'order_product_id', 'ingredient_id');
    }

    public function toppings(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'order_product_toppings', 'order_product_id', 'topping_id')
            ->withPivot('quantity');
    }
}
