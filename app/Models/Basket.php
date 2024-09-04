<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'total_price',
        'total_qty',
        'product_id',
        'order_id',
    ];

}
