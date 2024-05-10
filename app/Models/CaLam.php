<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaLam extends Model
{
    use HasFactory;

    protected $table = "ca_lams";
    protected $fillable = [
        'name',
        'gio_vao',
        'gio_ra',
        'is_open',
    ];
}
