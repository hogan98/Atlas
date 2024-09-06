<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'qty',
        'price',
        'status',
        'purchase_date',
        'order_id',
        'basket_id',
        'product_id',
        'user_id',
    ];

}
