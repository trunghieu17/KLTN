<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhanLichNhanVien;
use App\Models\NhanVien;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChamCongController extends Controller
{
    public function index()
    {
        $ngay_dau   = Carbon::today()->startOfWeek()->format('Y-m-d');
        $ngay_cuoi  = Carbon::today()->endOfWeek()->format('Y-m-d');

        return view('page.cham_cong.index', compact('ngay_dau', 'ngay_cuoi'));
    }

    public function dataNhanVien(Request $request)
    {
        $data = DB::table('nhan_viens')
                    ->leftJoin('chi_tiet_phan_lich_nhan_viens', function ($join) use ($request) {
                        $join->on('nhan_viens.id', '=', 'chi_tiet_phan_lich_nhan_viens.id_nhan_vien')
                            ->where('chi_tiet_phan_lich_nhan_viens.id_ca', $request->id_ca)
                            ->where('chi_tiet_phan_lich_nhan_viens.ngay_lam', $request->ngay_lam);
                    })
                    ->where('nhan_viens.id_phong_ban', $request->id_phong_ban)
                    ->select(
                        'nhan_viens.id',
                        'nhan_viens.ho_ten',
                        'nhan_viens.code',
                        'nhan_viens.id_phong_ban',
                        'chi_tiet_phan_lich_nhan_viens.is_check',
                        'chi_tiet_phan_lich_nhan_viens.ngay_lam'
                    )
                    ->get();

        return $this->responseData($data);
    }

    public function dataPhanLich(Request $request)
    {
        $ngay_dau   = Carbon::parse($request->ngay_dau);
        $ngay_cuoi  = Carbon::parse($request->ngay_cuoi);
        $array_ngay = [];
        while($ngay_dau->lte($ngay_cuoi)) {
            array_push($array_ngay, $ngay_dau->format('Y-m-d'));
            $ngay_dau->addDay();
        }


        $data = ChiTietPhanLichNhanVien::whereDate('ngay_lam', '>=', $request->ngay_dau)
                                       ->whereDate('ngay_lam', '<=', $request->ngay_cuoi)
                                       ->join('nhan_viens', 'nhan_viens.id', 'chi_tiet_phan_lich_nhan_viens.id_nhan_vien')
                                       ->select(
                                            'chi_tiet_phan_lich_nhan_viens.id_ca',
                                            'chi_tiet_phan_lich_nhan_viens.id_phong_ban',
                                            'chi_tiet_phan_lich_nhan_viens.id_nhan_vien',
                                            'chi_tiet_phan_lich_nhan_viens.thu',
                                            'chi_tiet_phan_lich_nhan_viens.is_check',
                                            'chi_tiet_phan_lich_nhan_viens.ngay_lam',
                                            'nhan_viens.ho_ten',
                                            'nhan_viens.code',
                                        )
                                        ->groupBy(
                                            'chi_tiet_phan_lich_nhan_viens.id_ca',
                                            'chi_tiet_phan_lich_nhan_viens.id_phong_ban',
                                            'chi_tiet_phan_lich_nhan_viens.id_nhan_vien',
                                            'chi_tiet_phan_lich_nhan_viens.thu',
                                            'chi_tiet_phan_lich_nhan_viens.is_check',
                                            'chi_tiet_phan_lich_nhan_viens.ngay_lam',
                                            'nhan_viens.ho_ten',
                                            'nhan_viens.code',
                                        )
                                       ->get();
        return response()->json([
            'data'      => $data,
            'data_ngay' => $array_ngay
        ]);
    }

    public function chamCongNhanVien(Request $request)
    {
        $cham_cong = ChiTietPhanLichNhanVien::where('id_nhan_vien', $request->id_nhan_vien)
                                            ->where('id_ca', $request->id_ca)
                                            ->whereDate('ngay_lam', $request->ngay_lam)
                                            ->where('id_phong_ban', $request->id_phong_ban)
                                            ->first();

        if($cham_cong) {
            $cham_cong->is_check = !$cham_cong->is_check;
            $cham_cong->save();

            return $this->responseSuccess("Chấm công nhân viên thành công!");
        }

        return $this->responseError("Nhân viên không có đăng kí lịch làm!");
    }
}
