<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    protected $table    = "nhan_viens";
    protected $fillable = [
        'ho_ten',
        'email',
        'so_dien_thoai',
        'so_can_cuoc',
        'ngay_sinh',
        'gioi_tinh',
        'que_quan',
        'thuong_tru',
        'id_chuc_vu',
        'id_phong_ban',
        'id_loai_nhan_vien',
        'id_bang_cap',
        'is_tai_khoan',
        'is_master',
        'password'
    ];
}
