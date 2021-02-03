<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloohash extends Model
{
    use HasFactory;
       protected $table='bloohash';
     protected $fillable = [
     	'id',
        'userName',
        'firstName',
        'lastName',
        'role',
        'phone',
        'pass',
        'dataStatus',
        'loginStatus',
        'activityStatus',
        'photo',
        'created_at',
        'updated_at',

    ];
}
