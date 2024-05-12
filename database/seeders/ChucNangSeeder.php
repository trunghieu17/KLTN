<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucNangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chuc_nangs')->delete();

        DB::table('chuc_nangs')->truncate();

        DB::table('chuc_nangs')->insert([
            ['id' => 1,     'name' => 'Loại nhân viên - Xem'], //Đi kèm với getdata
            ['id' => 2,     'name' => 'Loại nhân viên - Tạo mới'],
            ['id' => 3,     'name' => 'Loại nhân viên - Đổi trạng thái'],
            ['id' => 4,     'name' => 'Loại nhân viên - Cập nhật'],
            ['id' => 5,     'name' => 'Loại nhân viên - Xóa'],
            ['id' => 6,     'name' => 'Chức vụ - Xem'], //Đi kèm với getdata
            ['id' => 7,     'name' => 'Chức vụ - Tạo mới'],
            ['id' => 8,     'name' => 'Chức vụ - Đổi trạng thái'],
            ['id' => 9,     'name' => 'Chức vụ - Cập nhật'],
            ['id' => 10,    'name' => 'Chức vụ - Xóa'],
            ['id' => 11,    'name' => 'Phòng ban - Xem'], //Đi kèm với getdata
            ['id' => 12,    'name' => 'Phòng ban - Tạo mới'],
            ['id' => 13,    'name' => 'Phòng ban - Đổi trạng thái'],
            ['id' => 14,    'name' => 'Phòng ban - Cập nhật'],
            ['id' => 15,    'name' => 'Phòng ban - Xóa'],
            ['id' => 16,    'name' => 'Phân quyền - Xem'], //Đi kèm với getdata
            ['id' => 17,    'name' => 'Phân quyền - Tạo mới'],
            ['id' => 18,    'name' => 'Phân quyền - Đổi trạng thái'],
            ['id' => 19,    'name' => 'Phân quyền - Xóa'],
            ['id' => 20,    'name' => 'Nhân viên - Xem'], //Đi kèm với getdata
            ['id' => 21,    'name' => 'Nhân viên - Tạo mới'],
            ['id' => 22,    'name' => 'Nhân viên - Đổi trạng thái'],
            ['id' => 23,    'name' => 'Nhân viên - Cập nhật'],
            ['id' => 24,    'name' => 'Nhân viên - Xóa'],
            ['id' => 25,    'name' => 'Ca làm - Xem'], //Đi kèm với getdata
            ['id' => 26,    'name' => 'Ca làm - Tạo mới'],
            ['id' => 27,    'name' => 'Ca làm - Đổi trạng thái'],
            ['id' => 28,    'name' => 'Ca làm - Cập nhật'],
            ['id' => 29,    'name' => 'Ca làm - Xóa'],
            ['id' => 30,    'name' => 'Phân lịch làm - Xem'], //Đi kèm với getdata
            ['id' => 31,    'name' => 'Phân lịch làm - Phân lịch tháng'],
            ['id' => 32,    'name' => 'Phân lịch làm - Chấm công'],
            // ['id' => 33,    'name' => 'Phân lịch làm - Cập nhật'],
            // ['id' => 34,    'name' => 'Phân lịch làm - Xóa'],
            ['id' => 35,    'name' => 'Chấm công - Xem'], //Đi kèm với getdata
            ['id' => 36,    'name' => 'Chấm công - Chấm công nhân viên'],
            // ['id' => 37,    'name' => 'Chấm công - Đổi trạng thái'],
            // ['id' => 38,    'name' => 'Chấm công - Cập nhật'],
            // ['id' => 39,    'name' => 'Chấm công - Xóa'],
            ['id' => 40,    'name' => 'Lương - Xem'], //Đi kèm với getdata
            // ['id' => 41,    'name' => 'Lương - Tạo mới'],
            // ['id' => 42,    'name' => 'Lương - Đổi trạng thái'],
            // ['id' => 43,    'name' => 'Lương - Cập nhật'],
            // ['id' => 44,    'name' => 'Lương - Xóa'],
            ['id' => 45,    'name' => 'Thưởng phạt - Xem'], //Đi kèm với getdata
            ['id' => 46,    'name' => 'Thưởng phạt - Tạo mới'],
            ['id' => 47,    'name' => 'Thưởng phạt - Cập nhật'],
            ['id' => 48,    'name' => 'Thưởng phạt - Xóa'],
            ['id' => 49,    'name' => 'Tài khoản - Xem'], //Đi kèm với getdata
            ['id' => 50,    'name' => 'Tài khoản - Phân tài khoản'],
            ['id' => 51,    'name' => 'Tài khoản - Cấp mật khẩu'],
        ]);
    }
}
