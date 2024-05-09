<?php

namespace App\Http\Controllers;

use App\Models\Phongban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhongBanController extends Controller
{
    public function index()
    {
        return view('page.phong_ban.index');
    }

    public function store(Request $request)
    {
        Phongban::create($request->all());
        return $this->responseSuccess("Thêm mới chức vụ thành công!");
    }

    public function getData()
    {
        $data = Phongban::select('phongbans.*', DB::raw("DATE_FORMAT(phongbans.created_at, '%d/%m/%Y') as created"))->get();
        return $this->responseData($data);
    }

    public function changeStatus(Request $request)
    {
        $phang_ban = Phongban::find($request->id);
        if($phang_ban) {
            $phang_ban->is_open = !$phang_ban->is_open;
            $phang_ban->save();

            return $this->responseSuccess("Đã đổi trạng thái thành công!");
        } else {
            return $this->responseError("Đã có lỗi, vui lòng không can thiệp hệ thống!");
        }
    }

    public function update(Request $request)
    {
        $phang_ban = Phongban::find($request->id);
        if($phang_ban) {
            $phang_ban->update([
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
        $phang_ban = Phongban::find($request->id);
        if($phang_ban) {
            $phang_ban->delete();
            return $this->responseSuccess("Đã xóa thành công!");
        } else {
            return $this->responseError("Đã có lỗi, vui lòng không can thiệp hệ thống!");
        }
    }
}
