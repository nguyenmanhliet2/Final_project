<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'noi_dung_cmt',
        'id_user',
        'id_post',
        'name_user',
    ];
}
