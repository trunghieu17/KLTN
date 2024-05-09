<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    public function index()
    {
        return view('page.nhan_vien.index');
    }

    public function store(Request $request)
    {
        $nhan_vien = NhanVien::create($request->all());

        $ma_nhan_vien = "NVFF" . (10052024 + $nhan_vien->id);
        $nhan_vien->code = $ma_nhan_vien;
        $nhan_vien->save();

        return $this->responseSuccess("Thêm mới nhân viên thành công!");
    }
}
