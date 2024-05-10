<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhongBanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('phongbans')->delete();

        DB::table('phongbans')->truncate();

        DB::table('phongbans')->insert([
            ['id' => '1', 'name' => 'Lễ tân', 'mo_ta' => "Phòng ban phụ trách tiếp đón và hỗ trợ khách hàng khi đến và rời khách sạn, giải quyết các yêu cầu và thắc mắc của khách hàng", 'created_at' => Carbon::today()],
            ['id' => '2', 'name' => 'Quản lý phòng', 'mo_ta' => "Phòng ban chịu trách nhiệm quản lý các phòng nghỉ, đảm bảo các phòng luôn sạch sẽ và thoải mái cho khách", 'created_at' => Carbon::today()],
            ['id' => '3', 'name' => 'Nhà hàng', 'mo_ta' => "Phòng ban điều hành nhà hàng và bar trong khách sạn, phục vụ thực phẩm và đồ uống cho khách", 'created_at' => Carbon::today()],
            ['id' => '4', 'name' => 'Bảo trì', 'mo_ta' => "Phòng ban phụ trách bảo trì và sửa chữa các thiết bị, đảm bảo mọi thứ trong khách sạn hoạt động trơn tru", 'created_at' => Carbon::today()],
            ['id' => '5', 'name' => 'Kế toán', 'mo_ta' => "Phòng ban xử lý các giao dịch tài chính, báo cáo tài chính và quản lý ngân sách của khách sạn", 'created_at' => Carbon::today()],
            ['id' => '6', 'name' => 'Tiếp thị', 'mo_ta' => "Phòng ban phụ trách các chiến dịch quảng cáo và tiếp thị, nâng cao hình ảnh và thương hiệu của khách sạn", 'created_at' => Carbon::today()],
            ['id' => '7', 'name' => 'Sự kiện', 'mo_ta' => "Phòng ban tổ chức các sự kiện và hội nghị, đảm bảo các sự kiện diễn ra suôn sẻ và chuyên nghiệp", 'created_at' => Carbon::today()],
            ['id' => '8', 'name' => 'An ninh', 'mo_ta' => "Phòng ban chịu trách nhiệm đảm bảo an toàn và bảo mật cho khách sạn và khách lưu trú", 'created_at' => Carbon::today()],
            ['id' => '9', 'name' => 'Nhân sự', 'mo_ta' => "Phòng ban quản lý tuyển dụng, đào tạo và phát triển nhân viên, cũng như xử lý các vấn đề liên quan đến nhân sự", 'created_at' => Carbon::today()],
            ['id' => '10', 'name' => 'Spa và Thể thao', 'mo_ta' => "Phòng ban quản lý spa và các tiện ích thể thao, cung cấp các dịch vụ chăm sóc sức khỏe và thư giãn cho khách", 'created_at' => Carbon::today()]
        ]);
    }
}
