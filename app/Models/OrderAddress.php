<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    use HasFactory;

    protected $fillable = [
      'street',
      'house_number',
      'entrance',
      'apartment',
      'floor',
      'code'
    ];
}
