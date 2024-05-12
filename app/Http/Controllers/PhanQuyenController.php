<?php

namespace App\Http\Controllers;

use App\Models\ChucNang;
use App\Models\PhanQuyen;
use Illuminate\Http\Request;

class PhanQuyenController extends Controller
{
    public function index()
    {
        $id_chuc_nang = 16;
        return view('page.phan_quyen.index');
    }

    public function store(Request $request)
    {
        $id_chuc_nang = 17;
        $check_chuc_nang = ChucNang::where('id', $request->id_chuc_nang)->first();
        $check = PhanQuyen::where('id_chuc_vu', $request->id_chuc_vu)->where('id_chuc_nang', $request->id_chuc_nang)->first();
        if ($check_chuc_nang) {
            if ($check) {
                return $this->responseError("Quyền này đã được cấp!");
            } else {
                PhanQuyen::create($request->all());
                return $this->responseSuccess("Cấp quyền thành công!");
            }
        } else {
            return $this->responseError("Chức năng này không tồn tại!");
        }
    }

    public function getData($id_chuc_vu)
    {
        $id_chuc_nang = 16;
        $data = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)
            ->join('chuc_nangs', 'chuc_nangs.id', 'phan_quyens.id_chuc_nang')
            ->select('phan_quyens.*', 'chuc_nangs.name')
            ->get();
        return $this->responseData($data);
    }

    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 18;
        $phan_quyen = PhanQuyen::find($request->id);
        if ($phan_quyen) {
            $phan_quyen->is_open = !$phan_quyen->is_open;
            $phan_quyen->save();

            return $this->responseSuccess("Đã đổi trạng thái thành công!");
        } else {
            return $this->responseError("Đã có lỗi, vui lòng không can thiệp hệ thống!");
        }
    }

    public function destroy(Request $request)
    {
        $id_chuc_nang = 19;
        $phan_quyen = PhanQuyen::find($request->id);
        if ($phan_quyen) {
            $phan_quyen->delete();
            return $this->responseSuccess("Đã xóa thành công!");
        } else {
            return $this->responseError("Đã có lỗi, vui lòng không can thiệp hệ thống!");
        }
    }

    public function getDataChucNang($id_chuc_vu)
    {
        $id_chuc_nang = 16;
        $list_cap_quyen = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->select('id_chuc_nang')->get()->toArray();
        $data = ChucNang::whereNotIn('id', $list_cap_quyen)->get();
        return $this->responseData($data);
    }
}
