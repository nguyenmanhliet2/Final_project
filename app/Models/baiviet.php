<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baiviet extends Model
{
    use HasFactory;

    protected $table = 'baiviets';

    protected $fillable = [
        'id_nguoi_viet',
        'content',
        'title',
        'hinh_anh',
    ];
}
