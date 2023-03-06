<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseDetails extends Model
{
    use HasFactory;
    protected $table = 'warehouse_details';
    protected $fillable = [
        'id_product',
        'name_product',
        'input_quantity',
        'input_price',
        'id_warehouse_invoice',
    ];
}
