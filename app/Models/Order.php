<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
     protected $table='Order';
     protected $fillable = [
        'cart_id',
        'order_id',
        'customer_id',
        'product_id',
        'receving_status',
        'customer_status',

    ];

    protected $hidden = [
        'remember_token',
    ];
}
