<?php

namespace Database\Seeders;

use App\Models\NhanVien;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nhan_viens')->delete();

        DB::table('nhan_viens')->truncate();

        DB::table('nhan_viens')->insert([
            ["ho_ten" => "Nguyễn Văn A", "email" => "nguyenvana@gmail.com", "so_dien_thoai" => "0123456789", "so_can_cuoc" => "123456789", "ngay_sinh" => "1985-01-01", "gioi_tinh" => 1, "que_quan" => "Hà Nội", "thuong_tru" => "Hà Nội", "id_chuc_vu" => 1, "id_phong_ban" => 1, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Trần Thị B", "email" => "tran_thib@yahoo.com", "so_dien_thoai" => "0123456790", "so_can_cuoc" => "223456789", "ngay_sinh" => "1990-02-02", "gioi_tinh" => 0, "que_quan" => "TP HCM", "thuong_tru" => "TP HCM", "id_chuc_vu" => 2, "id_phong_ban" => 1, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Lê Văn C", "email" => "levanc@outlook.com", "so_dien_thoai" => "0123456791", "so_can_cuoc" => "323456789", "ngay_sinh" => "1988-03-03", "gioi_tinh" => 1, "que_quan" => "Đà Nẵng", "thuong_tru" => "Đà Nẵng", "id_chuc_vu" => 3, "id_phong_ban" => 1, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Phạm Văn D", "email" => "phamvand@gmail.com", "so_dien_thoai" => "0123456792", "so_can_cuoc" => "423456789", "ngay_sinh" => "1992-04-04", "gioi_tinh" => 1, "que_quan" => "Nha Trang", "thuong_tru" => "Nha Trang", "id_chuc_vu" => 4, "id_phong_ban" => 2, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Hoàng Thị E", "email" => "hoangthie@hotmail.com", "so_dien_thoai" => "0123456793", "so_can_cuoc" => "523456789", "ngay_sinh" => "1989-05-05", "gioi_tinh" => 0, "que_quan" => "Huế", "thuong_tru" => "Huế", "id_chuc_vu" => 5, "id_phong_ban" => 2, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Nguyễn Thị F", "email" => "nguyenthi_f@yahoo.com", "so_dien_thoai" => "0123456794", "so_can_cuoc" => "623456789", "ngay_sinh" => "1987-06-06", "gioi_tinh" => 0, "que_quan" => "Bình Định", "thuong_tru" => "Bình Định", "id_chuc_vu" => 6, "id_phong_ban" => 3, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Bùi Văn G", "email" => "buivang@gmail.com", "so_dien_thoai" => "0123456795", "so_can_cuoc" => "723456789", "ngay_sinh" => "1991-07-07", "gioi_tinh" => 1, "que_quan" => "Vĩnh Phúc", "thuong_tru" => "Vĩnh Phúc", "id_chuc_vu" => 1, "id_phong_ban" => 3, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Đỗ Thị H", "email" => "dothih@gmail.com", "so_dien_thoai" => "0123456796", "so_can_cuoc" => "823456789", "ngay_sinh" => "1984-08-08", "gioi_tinh" => 0, "que_quan" => "Quảng Ninh", "thuong_tru" => "Quảng Ninh", "id_chuc_vu" => 2, "id_phong_ban" => 4, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Lưu Văn I", "email" => "luuvani@outlook.com", "so_dien_thoai" => "0123456797", "so_can_cuoc" => "923456789", "ngay_sinh" => "1990-09-09", "gioi_tinh" => 1, "que_quan" => "Lâm Đồng", "thuong_tru" => "Lâm Đồng", "id_chuc_vu" => 3, "id_phong_ban" => 4, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Trịnh Thị J", "email" => "trinhthij@yahoo.com", "so_dien_thoai" => "0123456798", "so_can_cuoc" => "1023456789", "ngay_sinh" => "1993-10-10", "gioi_tinh" => 0, "que_quan" => "Thái Nguyên", "thuong_tru" => "Thái Nguyên", "id_chuc_vu" => 4, "id_phong_ban" => 5, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Mai Văn K", "email" => "maivank@gmail.com", "so_dien_thoai" => "0123456701", "so_can_cuoc" => "1123456789", "ngay_sinh" => "1986-11-11", "gioi_tinh" => 1, "que_quan" => "Cần Thơ", "thuong_tru" => "Cần Thơ", "id_chuc_vu" => 5, "id_phong_ban" => 5, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Vũ Thị L", "email" => "vuthil@gmail.com", "so_dien_thoai" => "0123456702", "so_can_cuoc" => "1223456789", "ngay_sinh" => "1995-12-12", "gioi_tinh" => 0, "que_quan" => "Bắc Giang", "thuong_tru" => "Bắc Giang", "id_chuc_vu" => 6, "id_phong_ban" => 6, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Ngô Văn M", "email" => "ngovanm@outlook.com", "so_dien_thoai" => "0123456703", "so_can_cuoc" => "1323456789", "ngay_sinh" => "1996-01-01", "gioi_tinh" => 1, "que_quan" => "Hải Phòng", "thuong_tru" => "Hải Phòng", "id_chuc_vu" => 1, "id_phong_ban" => 6, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Phan Thị N", "email" => "phanthin@yahoo.com", "so_dien_thoai" => "0123456704", "so_can_cuoc" => "1423456789", "ngay_sinh" => "1994-02-02", "gioi_tinh" => 0, "que_quan" => "Thanh Hóa", "thuong_tru" => "Thanh Hóa", "id_chuc_vu" => 2, "id_phong_ban" => 7, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Chu Văn O", "email" => "chuvano@gmail.com", "so_dien_thoai" => "0123456705", "so_can_cuoc" => "1523456789", "ngay_sinh" => "1989-03-03", "gioi_tinh" => 1, "que_quan" => "Bình Thuận", "thuong_tru" => "Bình Thuận", "id_chuc_vu" => 3, "id_phong_ban" => 7, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Lý Thị P", "email" => "lythip@hotmail.com", "so_dien_thoai" => "0123456706", "so_can_cuoc" => "1623456789", "ngay_sinh" => "1991-04-04", "gioi_tinh" => 0, "que_quan" => "Lào Cai", "thuong_tru" => "Lào Cai", "id_chuc_vu" => 4, "id_phong_ban" => 8, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Đặng Văn Q", "email" => "dangvanq@yahoo.com", "so_dien_thoai" => "0123456707", "so_can_cuoc" => "1723456789", "ngay_sinh" => "1982-05-05", "gioi_tinh" => 1, "que_quan" => "Hà Tĩnh", "thuong_tru" => "Hà Tĩnh", "id_chuc_vu" => 5, "id_phong_ban" => 8, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Trương Thị R", "email" => "truongthir@gmail.com", "so_dien_thoai" => "0123456708", "so_can_cuoc" => "1823456789", "ngay_sinh" => "1993-06-06", "gioi_tinh" => 0, "que_quan" => "Đồng Nai", "thuong_tru" => "Đồng Nai", "id_chuc_vu" => 6, "id_phong_ban" => 9, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Nguyễn Văn S", "email" => "nguyenvans@outlook.com", "so_dien_thoai" => "0123456709", "so_can_cuoc" => "1923456789", "ngay_sinh" => "1992-07-07", "gioi_tinh" => 1, "que_quan" => "Cà Mau", "thuong_tru" => "Cà Mau", "id_chuc_vu" => 1, "id_phong_ban" => 9, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Phạm Thị T", "email" => "phamthit@yahoo.com", "so_dien_thoai" => "0123456710", "so_can_cuoc" => "2023456789", "ngay_sinh" => "1995-08-08", "gioi_tinh" => 0, "que_quan" => "Kiên Giang", "thuong_tru" => "Kiên Giang", "id_chuc_vu" => 2, "id_phong_ban" => 10, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Lê Văn U", "email" => "levanu@gmail.com", "so_dien_thoai" => "0123456711", "so_can_cuoc" => "2123456789", "ngay_sinh" => "1987-09-09", "gioi_tinh" => 1, "que_quan" => "Quảng Bình", "thuong_tru" => "Quảng Bình", "id_chuc_vu" => 3, "id_phong_ban" => 10, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Ngô Thị V", "email" => "ngothiv@outlook.com", "so_dien_thoai" => "0123456712", "so_can_cuoc" => "2223456789", "ngay_sinh" => "1988-10-10", "gioi_tinh" => 0, "que_quan" => "Sơn La", "thuong_tru" => "Sơn La", "id_chuc_vu" => 4, "id_phong_ban" => 1, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Trần Văn W", "email" => "tranvanw@yahoo.com", "so_dien_thoai" => "0123456713", "so_can_cuoc" => "2323456789", "ngay_sinh" => "1989-11-11", "gioi_tinh" => 1, "que_quan" => "Hải Dương", "thuong_tru" => "Hải Dương", "id_chuc_vu" => 5, "id_phong_ban" => 2, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Phan Thị X", "email" => "phanthix@gmail.com", "so_dien_thoai" => "0123456714", "so_can_cuoc" => "2423456789", "ngay_sinh" => "1990-12-12", "gioi_tinh" => 0, "que_quan" => "Gia Lai", "thuong_tru" => "Gia Lai", "id_chuc_vu" => 6, "id_phong_ban" => 3, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Chu Văn Y", "email" => "chuvany@hotmail.com", "so_dien_thoai" => "0123456715", "so_can_cuoc" => "2523456789", "ngay_sinh" => "1984-01-01", "gioi_tinh" => 1, "que_quan" => "Long An", "thuong_tru" => "Long An", "id_chuc_vu" => 1, "id_phong_ban" => 4, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Lý Thị Z", "email" => "lythiz@yahoo.com", "so_dien_thoai" => "0123456716", "so_can_cuoc" => "2623456789", "ngay_sinh" => "1983-02-02", "gioi_tinh" => 0, "que_quan" => "Ninh Bình", "thuong_tru" => "Ninh Bình", "id_chuc_vu" => 2, "id_phong_ban" => 5, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Đặng Văn AA", "email" => "dangvanaa@gmail.com", "so_dien_thoai" => "0123456717", "so_can_cuoc" => "2723456789", "ngay_sinh" => "1991-03-03", "gioi_tinh" => 1, "que_quan" => "Bạc Liêu", "thuong_tru" => "Bạc Liêu", "id_chuc_vu" => 3, "id_phong_ban" => 6, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Trương Thị BB", "email" => "truongthibb@gmail.com", "so_dien_thoai" => "0123456718", "so_can_cuoc" => "2823456789", "ngay_sinh" => "1985-04-04", "gioi_tinh" => 0, "que_quan" => "Bến Tre", "thuong_tru" => "Bến Tre", "id_chuc_vu" => 4, "id_phong_ban" => 7, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Nguyễn Văn CC", "email" => "nguyenvancc@outlook.com", "so_dien_thoai" => "0123456719", "so_can_cuoc" => "2923456789", "ngay_sinh" => "1986-05-05", "gioi_tinh" => 1, "que_quan" => "Phú Thọ", "thuong_tru" => "Phú Thọ", "id_chuc_vu" => 5, "id_phong_ban" => 8, "id_loai_nhan_vien" => 1],
            ["ho_ten" => "Phạm Thị DD", "email" => "phamthidd@yahoo.com", "so_dien_thoai" => "0123456720", "so_can_cuoc" => "3023456789", "ngay_sinh" => "1982-06-06", "gioi_tinh" => 0, "que_quan" => "Hà Giang", "thuong_tru" => "Hà Giang", "id_chuc_vu" => 6, "id_phong_ban" => 9, "id_loai_nhan_vien" => 1]
        ]);

        $data = NhanVien::all();
        foreach ($data as $key => $value) {
            $ma_nhan_vien = "NVFF" . (10052024 + $value->id);
            $value->code = $ma_nhan_vien;
            $value->save();
        }
    }
}
