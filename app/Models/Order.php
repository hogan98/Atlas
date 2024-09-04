<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'total_qty',
        'total_price',
        'product_name',
        'product_quantity',
        'product_price',
        'status',
        'user_id',
        'product_id',
        'basket_id',
    ];

}
