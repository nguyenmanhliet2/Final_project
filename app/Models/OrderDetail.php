<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
       'product_id',
       'name_product',
       'product_quantity',
       'unit_price',
       'cart_status',
       'order_id',
       'client_id',
    ];
}
