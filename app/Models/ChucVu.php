<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    use HasFactory;

    protected $table    = "chuc_vus";
    protected $fillable = [
        'name',
        'mo_ta',
        'luong_co_ban',
        'is_open',
    ];
}
