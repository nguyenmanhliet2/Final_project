<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseInvoices extends Model
{
    use HasFactory;
    protected $table = 'warehouse_invoices';

    protected $fillable = [
        'hash',
        'order_code',
        'total_money',
        'total_amount',
        'status',
        'payment',
    ];
}
