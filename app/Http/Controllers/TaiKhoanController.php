<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaiKhoanController extends Controller
{
    public function index()
    {
        return view('page.tai_khoan.index');
    }

    public function phanTaiKhoan(Request $request)
    {
        $nhan_vien = NhanVien::find($request->id);
        if($nhan_vien) {
            $nhan_vien->is_tai_khoan = 1;
            $nhan_vien->save();

            return $this->responseSuccess("Phân Tài Khoản Thành Công!");
        }

        return $this->responseError('Đã có lỗi xảy ra!');
    }

    public function capMatKhau(Request $request)
    {
        $nhan_vien = NhanVien::find($request->id);
        if($nhan_vien) {
            $check = false;
            if($nhan_vien->password) {
                $check = true;
            }
            // $password = Str::random(12);
            // $nhan_vien->password = bcrypt(Str::random(12));
            $nhan_vien->password = bcrypt("123456");
            $nhan_vien->save();
            if($check) {
                return $this->responseSuccess("Cấp lại mật khẩu thành công!");
            }
            return $this->responseSuccess("Cấp mật khẩu Thành Công!");
        }

        return $this->responseError('Đã có lỗi xảy ra!');
    }
}
