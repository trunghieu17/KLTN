<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThuongPhat extends Model
{
    use HasFactory;

    protected $table    = "thuong_phats";
    protected $fillable = [
        'id_nhan_vien',
        'the_loai',
        'ngay_ghi_nhan',
        'tien_thuong',
        'ly_do',
        'ghi_chu',
    ];
}
