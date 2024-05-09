<?php

namespace App\Http\Controllers;

use App\Models\LoaiNhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoaiNhanVienController extends Controller
{
    public function index()
    {
        return view('page.loai_nhan_vien.index');
    }

    public function store(Request $request)
    {
        LoaiNhanVien::create($request->all());
        return $this->responseSuccess("Thêm mới loại nhân viên thành công!");
    }

    public function getData()
    {
        $data = LoaiNhanVien::select('loai_nhan_viens.*', DB::raw("DATE_FORMAT(loai_nhan_viens.created_at, '%d/%m/%Y') as created"))->get();
        return $this->responseData($data);
    }

    public function changeStatus(Request $request)
    {
        $loai_nhan_vien = LoaiNhanVien::find($request->id);
        if($loai_nhan_vien) {
            $loai_nhan_vien->is_open = !$loai_nhan_vien->is_open;
            $loai_nhan_vien->save();

            return $this->responseSuccess("Đã đổi trạng thái thành công!");
        } else {
            return $this->responseError("Đã có lỗi, vui lòng không can thiệp hệ thống!");
        }
    }

    public function update(Request $request)
    {
        $loai_nhan_vien = LoaiNhanVien::find($request->id);
        if($loai_nhan_vien) {
            $loai_nhan_vien->update([
                'name'      => $request->name,
                'mo_ta'     => $request->mo_ta,
            ]);

            return $this->responseSuccess("Đã cập nhật thành công!");
        } else {
            return $this->responseError("Đã có lỗi, vui lòng không can thiệp hệ thống!");
        }
    }

    public function destroy(Request $request)
    {
        $loai_nhan_vien = LoaiNhanVien::find($request->id);
        if($loai_nhan_vien) {
            $loai_nhan_vien->delete();
            return $this->responseSuccess("Đã xóa thành công!");
        } else {
            return $this->responseError("Đã có lỗi, vui lòng không can thiệp hệ thống!");
        }
    }
}
