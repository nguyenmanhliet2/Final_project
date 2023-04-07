<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [
        'order_code',
        'total_price',
        'sales_price_product',
        'real_price',
        'client_id',
        'payment_type',
    ];
}
