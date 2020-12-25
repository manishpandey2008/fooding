<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $table='registration';
     protected $fillable = [
        'user_id',
        'user_type',
        'name',
        'restaurant_name',
        'address',
        'phone_number',
        'food_type',
        'login_activity',
        'photo',
        'created_at',
        'updated_at',

    ];

    protected $hidden = [
        'remember_token',
    ];
}
