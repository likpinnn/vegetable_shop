<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;


    protected $fillable = [
        'item_id','mass','total_price',"status",'user_id','cart_id'
    ];


    // public function item()
    // {
    //     return $this->belongsTo(item::class);
    // }
}
