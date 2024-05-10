<?php

use App\Http\Controllers\CaLamController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\LoaiNhanVienController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PhanChiaCaController;
use App\Http\Controllers\PhongBanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('share.master');
});
Route::group(['prefix' => '/'], function () {
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

    Route::group(['prefix' => '/phong-ban'], function () {
        Route::get('/', [PhongBanController::class, 'index']);

        Route::get('/data', [PhongBanController::class, 'getData']);
        Route::post('/create', [PhongBanController::class, 'store']);
        Route::post('/change-status', [PhongBanController::class, 'changeStatus']);
        Route::post('/update', [PhongBanController::class, 'update']);
        Route::post('/delete', [PhongBanController::class, 'destroy']);
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

        Route::get('/data', [PhanChiaCaController::class, 'getData']);
        Route::post('/create', [PhanChiaCaController::class, 'store']);
        Route::post('/change-status', [PhanChiaCaController::class, 'changeStatus']);
        Route::post('/update', [PhanChiaCaController::class, 'update']);
        Route::post('/delete', [PhanChiaCaController::class, 'destroy']);
    });
});

