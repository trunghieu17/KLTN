<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NhanVienController extends Controller
{
    public function index()
    {
        $id_chuc_nang = 20;
        return view('page.nhan_vien.index');
    }

    public function store(Request $request)
    {
        $id_chuc_nang = 21;
        $nhan_vien = NhanVien::create($request->all());

        $ma_nhan_vien = "NVFF" . (10052024 + $nhan_vien->id);
        $nhan_vien->code = $ma_nhan_vien;
        $nhan_vien->save();

        return $this->responseSuccess("Thêm mới nhân viên thành công!");
    }

    public function getData()
    {
        $id_chuc_nang = 20;
        $data = NhanVien::join('phongbans', 'phongbans.id', 'nhan_viens.id_phong_ban')
                        ->join('loai_nhan_viens', 'loai_nhan_viens.id', 'nhan_viens.id_loai_nhan_vien')
                        ->join('chuc_vus', 'chuc_vus.id', 'nhan_viens.id_chuc_vu')
                        ->select('nhan_viens.*', 'phongbans.name as ten_phong_ban', 'chuc_vus.name as ten_chuc_vu', 'loai_nhan_viens.name as ten_loai_nhan_vien', DB::raw("DATE_FORMAT(nhan_viens.created_at, '%d/%m/%Y') as created"))
                        ->get();

        return $this->responseData($data);
    }

    public function indexLogin()
    {
        return view('page.login.index');
    }

    public function actionLogin(Request $request)
    {
        try {

        } catch (Exception $e) {
            toastr()->success('Tài khoản của bạn chưa được cấp mật khẩu!');
            return redirect('/login');
        }
        $check = Auth::guard('nhan_vien')->attempt([
            'email'     => $request->email,
            'password'  => $request->password
        ]);

        if($check) {
            $user = Auth::guard('nhan_vien')->user();
            if($user->is_open && $user->is_tai_khoan) {
                toastr()->success('Đăng nhập thành công!');
                return redirect('/');
            } else {
                Auth::guard('nhan_vien')->logout();
                toastr()->warning('Tài khoản của bạn đã bị khoá!');
                return redirect('/login');
            }
        } else {
            toastr()->success('Thông tin đăng nhập không chính xác!');
            return redirect('/login');
        }
    }
}
