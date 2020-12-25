<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table='products';
     protected $fillable = [
        'product_id',
        'product_name',
        'restaurant_id',
        'product_type',
        'product_price',
        'stock_status',
        'photo',
        'created_at',
        'updated_at',

    ];

    protected $hidden = [
        'remember_token',
    ];
}
