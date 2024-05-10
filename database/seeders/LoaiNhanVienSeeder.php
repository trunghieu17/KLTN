<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiNhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loai_nhan_viens')->delete();

        DB::table('loai_nhan_viens')->truncate();

        DB::table('loai_nhan_viens')->insert([
            ['id' => '1', 'name' => 'Nhân viên toàn thời gian', 'mo_ta' => "Nhân viên làm việc toàn thời gian, có mức lương cố định và các quyền lợi đầy đủ", 'created_at' => Carbon::today()],
            ['id' => '2', 'name' => 'Nhân viên bán thời gian', 'mo_ta' => "Nhân viên làm việc theo giờ, linh hoạt thời gian và không bao gồm đầy đủ các quyền lợi", 'created_at' => Carbon::today()],
            ['id' => '3', 'name' => 'Nhân viên hợp đồng', 'mo_ta' => "Nhân viên làm việc theo hợp đồng cho dự án hoặc mùa vụ, không có cam kết dài hạn", 'created_at' => Carbon::today()],
            ['id' => '4', 'name' => 'Nhân viên thời vụ', 'mo_ta' => "Nhân viên làm việc trong các khoảng thời gian nhất định của năm, thường là mùa cao điểm du lịch", 'created_at' => Carbon::today()],
            ['id' => '5', 'name' => 'Nhân viên thực tập', 'mo_ta' => "Sinh viên hoặc người mới tốt nghiệp đang thực tập để học hỏi và tích lũy kinh nghiệm", 'created_at' => Carbon::today()]
        ]);
    }
}
