<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cartid extends Model
{
    protected $fillable = [
        'cart_id',
        'user_id',
        'trade_number'
    ];
    use HasFactory;
}
