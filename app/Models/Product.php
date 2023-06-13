<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'sub_category_id',
        'old_price',
        'new_price',
        'weight',
        'purchases_count',
        'thumbnail',
        'is_visible',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function sub_category(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function dough_specs(): HasMany
    {
        return $this->hasMany(DoughSpec::class);
    }

    public function size_specs(): HasMany
    {
        return $this->hasMany(SizeSpec::class);
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'recipes', 'product_id', 'ingredient_id');
    }
}
