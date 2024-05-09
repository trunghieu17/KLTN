<?php

use App\Http\Controllers\LoaiNhanVienController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(['prefix' => '/loai-nhan-vien'], function () {
    Route::get('/data', [LoaiNhanVienController::class, 'getData']);
    Route::post('/create', [LoaiNhanVienController::class, 'store']);
});
