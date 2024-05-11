<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function getData()
    {
        $data = NhanVien::join('phongbans', 'phongbans.id', 'nhan_viens.id_phong_ban')
                        ->join('loai_nhan_viens', 'loai_nhan_viens.id', 'nhan_viens.id_loai_nhan_vien')
                        ->join('chuc_vus', 'chuc_vus.id', 'nhan_viens.id_chuc_vu')
                        ->select('nhan_viens.*', 'phongbans.name as ten_phong_ban', 'chuc_vus.name as ten_chuc_vu', 'loai_nhan_viens.name as ten_loai_nhan_vien', DB::raw("DATE_FORMAT(nhan_viens.created_at, '%d/%m/%Y') as created"))
                        ->get();

        return $this->responseData($data);
    }
}
