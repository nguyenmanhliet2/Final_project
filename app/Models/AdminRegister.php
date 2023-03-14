<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminRegister extends Authenticatable
{
    use HasFactory;
    protected $table = 'admin_registers';

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'password',
        'address',
        'city',
        'male',
        'block',
        'active',
        'hash',
    ];
}
