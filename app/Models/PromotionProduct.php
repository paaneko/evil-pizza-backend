<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PromotionProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'bannerName',
        'left_decor_link',
        'right_decor_link',
        'is_visible',
        'available_until',
    ];

    public function promo_bullets(): HasMany
    {
         return $this->hasMany(PromoBullet::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
