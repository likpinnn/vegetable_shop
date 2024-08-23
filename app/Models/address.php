<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    protected $table = 'addresss';

    protected $fillable = [
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'p_code',
        'user_id'

    ];
}
