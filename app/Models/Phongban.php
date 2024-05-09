<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phongban extends Model
{
    use HasFactory;

    protected $table = "phongbans";
    protected $fillable = [
        'name',
        'code',
        'mo_ta',
        'is_open'
    ];
}
