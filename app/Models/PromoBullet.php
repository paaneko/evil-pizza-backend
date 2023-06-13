<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoBullet extends Model
{
    use HasFactory;

    protected $fillable = [
        'promotion_product_id',
        'name'
    ];
}
