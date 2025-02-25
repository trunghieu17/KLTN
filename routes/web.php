<?php

use App\Http\Controllers\CaLamController;
use App\Http\Controllers\ChamCongController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\LoaiNhanVienController;
use App\Http\Controllers\LuongController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PhanChiaCaController;
use App\Http\Controllers\PhanQuyenController;
use App\Http\Controllers\PhongBanController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\ThuongPhatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('share.master');
});

Route::get('/login', [NhanVienController::class, 'indexLogin']);
Route::post('/login', [NhanVienController::class, 'actionLogin']);
Route::group(['prefix' => '/', 'middleware' => "NhanVienMiddleWare"], function () {
    Route::group(['prefix' => '/loai-nhan-vien'], function () {
        Route::get('/', [LoaiNhanVienController::class, 'index']);

        Route::get('/data', [LoaiNhanVienController::class, 'getData']);
        Route::post('/create', [LoaiNhanVienController::class, 'store']);
        Route::post('/change-status', [LoaiNhanVienController::class, 'changeStatus']);
        Route::post('/update', [LoaiNhanVienController::class, 'update']);
        Route::post('/delete', [LoaiNhanVienController::class, 'destroy']);
    });

    Route::group(['prefix' => '/chuc-vu'], function () {
        Route::get('/', [ChucVuController::class, 'index']);

        Route::get('/data', [ChucVuController::class, 'getData']);
        Route::post('/create', [ChucVuController::class, 'store']);
        Route::post('/change-status', [ChucVuController::class, 'changeStatus']);
        Route::post('/update', [ChucVuController::class, 'update']);
        Route::post('/delete', [ChucVuController::class, 'destroy']);
    });

    Route::group(['prefix' => '/phong-ban'], function () {
        Route::get('/', [PhongBanController::class, 'index']);

        Route::get('/data', [PhongBanController::class, 'getData']);
        Route::post('/create', [PhongBanController::class, 'store']);
        Route::post('/change-status', [PhongBanController::class, 'changeStatus']);
        Route::post('/update', [PhongBanController::class, 'update']);
        Route::post('/delete', [PhongBanController::class, 'destroy']);
    });

    Route::group(['prefix' => '/phan-quyen'], function () {
        Route::get('/', [PhanQuyenController::class, 'index']);
        Route::get('data-chuc-nang/{id_chuc_vu}', [PhanQuyenController::class, 'getDataChucNang']);
        Route::get('/data/{id_chuc_vu}', [PhanQuyenController::class, 'getData']);
        Route::post('/create', [PhanQuyenController::class, 'store']);
        Route::post('/change-status', [PhanQuyenController::class, 'changeStatus']);
        // Route::post('/update', [PhanQuyenController::class, 'update']);
        Route::post('/delete', [PhanQuyenController::class, 'destroy']);
    });

    Route::group(['prefix' => '/nhan-vien'], function () {
        Route::get('/', [NhanVienController::class, 'index']);

        Route::get('/data', [NhanVienController::class, 'getData']);
        Route::post('/create', [NhanVienController::class, 'store']);
        Route::post('/change-status', [NhanVienController::class, 'changeStatus']);
        Route::post('/update', [NhanVienController::class, 'update']);
        Route::post('/delete', [NhanVienController::class, 'destroy']);
    });

    Route::group(['prefix' => '/ca-lam'], function () {
        Route::get('/', [CaLamController::class, 'index']);

        Route::get('/data', [CaLamController::class, 'getData']);
        Route::post('/create', [CaLamController::class, 'store']);
        Route::post('/change-status', [CaLamController::class, 'changeStatus']);
        Route::post('/update', [CaLamController::class, 'update']);
        Route::post('/delete', [CaLamController::class, 'destroy']);
    });

    Route::group(['prefix' => '/phan-lich-lam'], function () {
        Route::get('/', [PhanChiaCaController::class, 'index']);
        Route::post('/data', [PhanChiaCaController::class, 'data']);
        Route::post('/phan-lich-thang', [PhanChiaCaController::class, 'phanLichThang']);
        Route::post('/update-cham-cong', [PhanChiaCaController::class, 'updateChamCong']);
    });

    Route::group(['prefix' => '/cham-cong'], function () {
        Route::get('/', [ChamCongController::class, 'index']);
        Route::post('/data-nhan-vien', [ChamCongController::class, 'dataNhanVien']);
        Route::post('/data-phan-lich', [ChamCongController::class, 'dataPhanLich']);
        Route::post('/cham-cong-nhan-vien', [ChamCongController::class, 'chamCongNhanVien']);
    });

    Route::group(['prefix' => '/luong'], function () {
        Route::get('/', [LuongController::class, 'index']);
        Route::post('/data', [LuongController::class, 'dataLuong']);
    });

    Route::group(['prefix' => '/thuong-phat'], function () {
        Route::get('/', [ThuongPhatController::class, 'index']);
        Route::get('/data', [ThuongPhatController::class, 'dataThuongPhat']);

        Route::post('/create', [ThuongPhatController::class, 'store']);
        Route::post('/update', [ThuongPhatController::class, 'update']);
        Route::post('/delete', [ThuongPhatController::class, 'destroy']);
    });

    Route::group(['prefix' => '/tai-khoan'], function () {
        Route::get('/', [TaiKhoanController::class, 'index']);

        Route::post('/phan-tai-khoan', [TaiKhoanController::class, 'phanTaiKhoan']);
        Route::post('/cap-mat-khau', [TaiKhoanController::class, 'capMatKhau']);
    });
});
