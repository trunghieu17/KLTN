<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietPhanLichNhanVien extends Model
{
    use HasFactory;

    protected $table = "chi_tiet_phan_lich_nhan_viens";
    protected $fillable = [
        'id_ca',
        'id_phong_ban',
        'id_nhan_vien',
        'thu',
        'ngay_lam',
        'is_check',
    ];
}
