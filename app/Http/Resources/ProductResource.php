<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\SubCategoryResource;
use App\Http\Resources\DoughSpecResource;
use App\Http\Resources\SizeSpecResource;
use App\Http\Resources\IngredientResource;
use App\Http\Resources\ToppingResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'categoryId' => $this->category_id,
            'subCategoryId' => $this->sub_category_id,
            'purchasesCount' => $this->purchases_count,
            'oldPrice' => $this->old_price,
            'newPrice' => $this->new_price,
            'weight' => $this->weight,
            'thumbnail' => $this->thumbnail,
            'slug' => $this->slug,
            'category' => new CategoryResource($this->category),
            'subCategory' => new SubCategoryResource($this->category),
            'doughSpecs' => DoughSpecResource::collection($this->dough_specs),
            'sizeSpecs' => SizeSpecResource::collection($this->size_specs),
            'ingredients' => IngredientResource::collection($this->ingredients),
            'toppings' => ToppingResource::collection($this->toppings)

        ];
    }
}
