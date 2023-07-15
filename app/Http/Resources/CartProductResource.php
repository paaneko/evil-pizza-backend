<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'hash' => $this->hash,
            'product' => [
                'productId' => $this->product->id,
                'name' => $this->product->name,
                'thumbnail' => $this->product->thumbnail,
                'selectedSize' => [
                    'id' => $this->size_spec->id,
                    'name' => $this->size_spec->name,
                ],
                'selectedDough' => ($this->dough_spec) ? [
                    'id' => $this->dough_spec->id,
                    'name' => $this->dough_spec->name,
                ] : null,
                'selectedToppings' => (!empty($this->toppings))
                    ? $this->toppings->map(function ($topping) {
                        return [
                            'id' => $topping->id,
                            'name' => $topping->name,
                        ];
                    }) : [],
                'removedIngredients' => (!empty($this->excluded_ingredients))
                    ? $this->excluded_ingredients->map(function ($ingr) {
                        return [
                            'id' => $ingr->id,
                            'name' => $ingr->name,
                        ];
                    }) : [],
                'totalWeight' => $this->getCartProductWeight($this, false),
                'totalPrice' => $this->getCartProductPrice($this, false),
                'discountTotalPrice' => 0,
            ],
            'quantity' => $this->quantity,
        ];
    }
}
