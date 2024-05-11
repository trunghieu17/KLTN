<?php

namespace App\Http\Controllers;

use App\Models\ChiTietPhanLichNhanVien;
use App\Models\NhanVien;
use Carbon\Carbon;
use COM;
use Illuminate\Http\Request;

class PhanChiaCaController extends Controller
{
    public function index()
    {
        $ngay_dau   = Carbon::today()->format('Y-m-d');
        $ngay_cuoi  = Carbon::today()->endOfMonth()->format('Y-m-d');
        return view('page.phan_ca_lam.index', compact('ngay_dau', 'ngay_cuoi'));
    }

    public function data(Request $request)
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
                                            'nhan_viens.ho_ten',
                                            'nhan_viens.code',
                                        )
                                        ->groupBy(
                                            'chi_tiet_phan_lich_nhan_viens.id_ca',
                                            'chi_tiet_phan_lich_nhan_viens.id_phong_ban',
                                            'chi_tiet_phan_lich_nhan_viens.id_nhan_vien',
                                            'chi_tiet_phan_lich_nhan_viens.thu',
                                            'chi_tiet_phan_lich_nhan_viens.is_check',
                                            'nhan_viens.ho_ten',
                                            'nhan_viens.code',
                                        )
                                       ->get();
        return response()->json([
            'data'      => $data,
            'data_ngay' => $array_ngay
        ]);
    }

    public function phanLichThang(Request $request)
    {

        $ngay_dau = Carbon::parse($request->ngay_dau);
        $ngay_cuoi = Carbon::parse($request->ngay_cuoi);

        if($ngay_dau->lt(Carbon::today())) {
            return $this->responseError("Không được đổi lịch trong quá khứ!<br>Ngày đầu phải lớn hơn hôm nay!");
        }

        ChiTietPhanLichNhanVien::whereDate('ngay_lam', '>=', $request->ngay_dau)
                                       ->whereDate('ngay_lam', '<=', $request->ngay_cuoi)
                                       ->where('id_phong_ban', $request->id_phong_ban)
                                       ->where('id_ca', $request->id_ca)
                                       ->where('thu', $request->thu)
                                       ->delete();

        $list_nhan_vien = NhanVien::whereIn('id', $request->list_id_nhan_vien)->get();
        if($list_nhan_vien->count() == count($request->list_id_nhan_vien)) {
            while($ngay_dau->lte($ngay_cuoi)) {
                foreach ($request->list_id_nhan_vien as $key => $value) {
                    ChiTietPhanLichNhanVien::create([
                        'id_ca'             => $request->id_ca,
                        'id_phong_ban'      => $request->id_phong_ban,
                        'id_nhan_vien'      => $value,
                        'thu'               => $request->thu,
                        'ngay_lam'          => $ngay_dau,
                    ]);
                }
                $ngay_dau->addDay();
            }

            return $this->responseSuccess("Phân Lịch Nhân Viên Thành Công!");
        } else {
            return $this->responseError("Đã có lỗi xảy ra!");
        }
    }

    public function updateChamCong(Request $request)
    {
        if($request->type == 1) {
            $cham_cong = ChiTietPhanLichNhanVien::where('id_nhan_vien', $request->id_nhan_vien)
                                                ->where('id_ca', $request->id_ca)
                                                ->whereDate('ngay_lam', $request->ngay_lam)
                                                ->where('id_phong_ban', $request->id_phong_ban)
                                                ->first();

            if($cham_cong) {
                $cham_cong->delete();

                return $this->responseSuccess("Xóa Lịch nhân viên thành công!");
            } else {
                return $this->responseError('Nhân viên không có đăng kí làm việc!');
            }
        } else {
            $cham_cong = ChiTietPhanLichNhanVien::where('id_ca', $request->id_ca)
                                                ->whereDate('ngay_lam', $request->ngay_lam)
                                                ->where('id_phong_ban', $request->id_phong_ban)
                                                ->first();
            ChiTietPhanLichNhanVien::create([
                'id_ca'          => $request->id_ca,
                'id_phong_ban'   => $request->id_phong_ban,
                'id_nhan_vien'   => $request->id_nhan_vien,
                'thu'            => $cham_cong->thu,
                'ngay_lam'       => $request->ngay_lam,
            ]);

            return $this->responseSuccess("Phân lịch nhân viên thành công!");
        }
        return $this->responseError('Đã có lỗi xảy ra!');
    }
}
