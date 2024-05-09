<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiNhanVien extends Model
{
    use HasFactory;
    protected $table    = "loai_nhan_viens";
    protected $fillable = [
        'name',
        'mo_ta',
        'is_open',
    ];
}
