<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        $this->call(LoaiNhanVienSeeder::class);
        $this->call(ChucVuSeeder::class);
        $this->call(PhongBanSeeder::class);
        $this->call(NhanVienSeeder::class);
        $this->call(CaSangSeeder::class);
        $this->call(ChucNangSeeder::class);
    }
}
