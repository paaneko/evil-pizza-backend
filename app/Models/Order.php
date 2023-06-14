<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'status',
        'payment_type',
        'total_price',
        'notes',
    ];

    public function order_products(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function address(): HasOne
    {
        return $this->hasOne(OrderAddress::class);
    }
}
