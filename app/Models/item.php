<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{   
    
    protected $fillable = [
        'image',
        'p_name',
        'price_mass',
        'price',
    ];

    use HasFactory;

}
