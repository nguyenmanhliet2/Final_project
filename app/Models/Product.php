<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'name_product',
        'slug_product',
        'id_product_catalog',
        'description_product',
        'price_product',
        'sales_price_product',
        'status_product',
        'image_product',
        'quantity_product',
    ];
}
