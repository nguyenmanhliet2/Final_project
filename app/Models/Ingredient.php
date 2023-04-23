<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $table = 'ingredients';

    protected $fillable = [
        'code_ingredient',
        'name_ingredient',
        'slug_ingredient',
        'quantity_ingredient',
        'price_ingredient',
        'total_price_ingredient',

        'status_ingredient',
    ];
}
