<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chuc_vus')->delete();

        DB::table('chuc_vus')->truncate();

        DB::table('chuc_vus')->insert([
            ['id' => '1', 'name' => 'Giám đốc', 'mo_ta' => "Quản lý tổng thể các hoạt động của khách sạn, đảm bảo hiệu quả hoạt động và chất lượng dịch vụ", 'luong_co_ban' => 600000, 'created_at' => Carbon::today()],
            ['id' => '2', 'name' => 'Phó giám đốc', 'mo_ta' => "Hỗ trợ Giám đốc trong việc quản lý và điều hành các hoạt động của khách sạn", 'luong_co_ban' => 560000, 'created_at' => Carbon::today()],
            ['id' => '3', 'name' => 'Trưởng phòng', 'mo_ta' => "Quản lý tổng thể các hoạt động và nhân viên trong phòng ban mình phụ trách", 'luong_co_ban' => 310000, 'created_at' => Carbon::today()],
            ['id' => '4', 'name' => 'Phó phòng', 'mo_ta' => "Hỗ trợ Trưởng phòng trong việc quản lý và điều hành các hoạt động của phòng", 'luong_co_ban' => 270000, 'created_at' => Carbon::today()],
            ['id' => '5', 'name' => 'Quản lý', 'mo_ta' => "Chịu trách nhiệm quản lý các ca làm việc của nhân viên, đảm bảo hoạt động suôn sẻ trong ca của mình", 'luong_co_ban' => 230000, 'created_at' => Carbon::today()],
            ['id' => '6', 'name' => 'Nhân viên', 'mo_ta' => "Thực hiện các nhiệm vụ hàng ngày theo sự phân công của Trưởng phòng hoặc Phó phòng", 'luong_co_ban' => 200000, 'created_at' => Carbon::today()],
        ]);
    }
}
