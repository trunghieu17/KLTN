<?php

namespace App\Http\Controllers;

use App\Models\CaLam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaLamController extends Controller
{
    public function index()
    {
        $id_chuc_nang = 25;
        return view('page.ca_lam.index');
    }

    public function store(Request $request)
    {
        $id_chuc_nang = 26;
        CaLam::create($request->all());
        return $this->responseSuccess("Thêm mới ca làm thành công!");
    }

    public function getData()
    {
        $id_chuc_nang = 25;
        $data = CaLam::select('ca_lams.*', DB::raw("DATE_FORMAT(ca_lams.created_at, '%d/%m/%Y') as created"))->get();
        return $this->responseData($data);
    }

    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 27;
        $phang_ban = CaLam::find($request->id);
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
        $id_chuc_nang = 28;
        $phang_ban = CaLam::find($request->id);
        if($phang_ban) {
            $phang_ban->update([
                'name'              => $request->name,
                'gio_vao'           => $request->gio_vao,
                'gio_ra'            => $request->gio_ra,
            ]);

            return $this->responseSuccess("Đã cập nhật thành công!");
        } else {
            return $this->responseError("Đã có lỗi, vui lòng không can thiệp hệ thống!");
        }
    }

    public function destroy(Request $request)
    {
        $id_chuc_nang = 29;
        $phang_ban = CaLam::find($request->id);
        if($phang_ban) {
            $phang_ban->delete();
            return $this->responseSuccess("Đã xóa thành công!");
        } else {
            return $this->responseError("Đã có lỗi, vui lòng không can thiệp hệ thống!");
        }
    }
}
