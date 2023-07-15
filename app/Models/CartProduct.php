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

    protected $fillable = [
        'hash',
        'user_cart_id',
        'quantity',
        'product_id',
        'size_spec_id',
        'dough_spec_id',
    ];

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
        return $this->belongsToMany(Topping::class, 'cart_product_toppings', 'cart_product_id', 'topping_id');
    }

    public function getCartProductPrice($data, bool $isDiscount) {
        // TODO Getting data from func is not good
        $productPrice = (!$isDiscount) ?
            $data->product->old_price :
            $data->product->new_price;

        // TODO enhance performance
        if (!$productPrice) return null;

        $sizePrice = $data->size_spec->extra_price;
        $doughPrice = $data->dough_spec->extra_price ?? 0;

        $extraToppingsPrice = $data->size_spec->extra_toppings_price;

        $totalToppingPrice = $this->toppings->reduce(function ($carry, $topping) use ($extraToppingsPrice) {
            return $carry + $topping->extra_price + $extraToppingsPrice;
        }, 0);

        return $productPrice +
            $totalToppingPrice +
            $sizePrice +
            $doughPrice;
    }

    public function getCartProductWeight($data) {
        $productWeight = $data->product->weight;

        // TODO enhance performance

        $sizeWeight = $data->size_spec->extra_weight;
        $doughWeight = $data->dough_spec->extra_weight ?? 0;

        $extraToppingsWeightRate = $data->size_spec->extra_toppings_weight_rate;
        $toppingWeight = $this->toppings->sum('extra_weight');

        return $productWeight +
            ($toppingWeight * $extraToppingsWeightRate + $toppingWeight) +
            $sizeWeight +
            $doughWeight;
    }
}
