<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChucVuController extends Controller
{
    public function index()
    {
        $id_chuc_nang = 6;
        return view('page.chuc_vu.index');
    }

    public function store(Request $request)
    {
        $id_chuc_nang = 7;
        ChucVu::create($request->all());
        return $this->responseSuccess("Thêm mới chức vụ thành công!");
    }

    public function getData()
    {
        $id_chuc_nang = 6;
        $data = ChucVu::select('chuc_vus.*', DB::raw("DATE_FORMAT(chuc_vus.created_at, '%d/%m/%Y') as created"))->get();
        return $this->responseData($data);
    }

    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 8;
        $loai_nhan_vien = ChucVu::find($request->id);
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
        $id_chuc_nang = 9;
        $loai_nhan_vien = ChucVu::find($request->id);
        if($loai_nhan_vien) {
            $loai_nhan_vien->update([
                'name'              => $request->name,
                'luong_co_ban'      => $request->luong_co_ban,
                'mo_ta'             => $request->mo_ta,
            ]);

            return $this->responseSuccess("Đã cập nhật thành công!");
        } else {
            return $this->responseError("Đã có lỗi, vui lòng không can thiệp hệ thống!");
        }
    }

    public function destroy(Request $request)
    {
        $id_chuc_nang = 10;
        $loai_nhan_vien = ChucVu::find($request->id);
        if($loai_nhan_vien) {
            $loai_nhan_vien->delete();
            return $this->responseSuccess("Đã xóa thành công!");
        } else {
            return $this->responseError("Đã có lỗi, vui lòng không can thiệp hệ thống!");
        }
    }
}
