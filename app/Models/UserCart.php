<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserCart extends Model
{
    use HasFactory;

    public function cart_products(): HasMany
    {
        return $this->hasMany(CartProduct::class);
    }
}
