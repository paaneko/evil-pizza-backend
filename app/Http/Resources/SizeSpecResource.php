<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SizeSpecResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'productId' => $this->product_id,
            'name' => $this->name,
            'extraPrice' => $this->extra_price,
            'extraWeight' => $this->extra_weight,
            'extraToppingsPrice' => $this->extra_toppings_price,
            'extraToppingsWeightRate' => $this->extra_toppings_weight_rate,
        ];
    }
}
