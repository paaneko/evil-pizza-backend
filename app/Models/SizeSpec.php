<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeSpec extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'product_id',
        'extra_price',
        'extra_weight',
        'extra_toppings_price',
        'extra_toppings_weight_rate'
    ];
}
