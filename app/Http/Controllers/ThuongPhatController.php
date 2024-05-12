<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use App\Models\Phongban;
use App\Models\ThuongPhat;
use Illuminate\Http\Request;

class ThuongPhatController extends Controller
{
    public function index()
    {
        $id_chuc_nang = 45;
        return view('page.thuong_phat.index');
    }

    public function dataThuongPhat()
    {
        $id_chuc_nang = 45;
        $data = ThuongPhat::join('nhan_viens', 'nhan_viens.id', 'thuong_phats.id_nhan_vien')
                          ->join('phongbans', 'phongbans.id', 'nhan_viens.id_phong_ban')
                          ->join('chuc_vus', 'chuc_vus.id', 'nhan_viens.id_chuc_vu')
                          ->select('thuong_phats.*', 'nhan_viens.code', 'nhan_viens.ho_ten', 'phongbans.name as ten_phong_ban', 'chuc_vus.name as ten_chuc_vu')
                          ->get();

        return $this->responseData($data);
    }

    public function store(Request $request)
    {
        $id_chuc_nang = 46;
        $nhan_vien = NhanVien::where('id', $request->id_nhan_vien)
                             ->where('is_open', 1)->first();

        if($nhan_vien) {
            ThuongPhat::create($request->all());

            return $this->responseSuccess("Thêm mới Thưởng Phạt Thành Công!");
        }

        return $this->responseError("Đã có lỗi xảy ra!");
    }

    public function update(Request $request)
    {
        $id_chuc_nang = 47;
        $thuong_phat = ThuongPhat::find($request->id);
        if($thuong_phat) {
            $thuong_phat->update($request->all());

            return $this->responseSuccess("Đã cập nhật thành công!");
        } else {
            return $this->responseError("Đã có lỗi, vui lòng không can thiệp hệ thống!");
        }
    }

    public function destroy(Request $request)
    {
        $id_chuc_nang = 48;
        $thuong_phat = ThuongPhat::find($request->id);
        if($thuong_phat) {
            $thuong_phat->delete();
            return $this->responseSuccess("Đã xóa thành công!");
        } else {
            return $this->responseError("Đã có lỗi, vui lòng không can thiệp hệ thống!");
        }
    }

}
