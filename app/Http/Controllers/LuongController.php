<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LuongController extends Controller
{
    public function index()
    {
        $ngay_dau   = Carbon::today()->startOfMonth()->format('Y-m-d');
        $ngay_cuoi  = Carbon::today()->endOfMonth()->format('Y-m-d');
        return view('page.luong.index', compact('ngay_dau', 'ngay_cuoi'));
    }

    public function dataLuong(Request $request)
    {
        $ngay_dau   = Carbon::parse($request->ngay_dau);
        $ngay_cuoi  = Carbon::parse($request->ngay_cuoi);

        $data = NhanVien::where('nhan_viens.is_open', 1)
                        ->join('phongbans', 'phongbans.id', 'nhan_viens.id_phong_ban')
                        ->join('chuc_vus', 'chuc_vus.id', 'nhan_viens.id_chuc_vu')
                        ->join('loai_nhan_viens', 'loai_nhan_viens.id', 'nhan_viens.id_loai_nhan_vien')
                        ->leftjoin('chi_tiet_phan_lich_nhan_viens', 'chi_tiet_phan_lich_nhan_viens.id_nhan_vien', 'nhan_viens.id')
                        ->select(
                            'nhan_viens.id',
                            'nhan_viens.code',
                            'nhan_viens.ho_ten',
                            'phongbans.name as ten_phong_ban',
                            'chuc_vus.name as ten_chuc_vu',
                            'loai_nhan_viens.name as ten_loai_nhan_vien',
                            'chuc_vus.luong_co_ban',
                            DB::raw('SUM(IF(chi_tiet_phan_lich_nhan_viens.is_check = 1, 1, 0)) as tong_di_lam'),
                            DB::raw('SUM(IF(chi_tiet_phan_lich_nhan_viens.is_check = 0, 1, 0)) as tong_nghi')
                        )
                        ->groupBy(
                            'nhan_viens.id',
                            'nhan_viens.code',
                            'nhan_viens.ho_ten',
                            'phongbans.name',
                            'chuc_vus.name',
                            'loai_nhan_viens.name',
                            'chuc_vus.luong_co_ban',
                        )
                        ->get();

        return $this->responseData($data);
    }
}
