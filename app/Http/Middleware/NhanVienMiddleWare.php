<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class NhanVienMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $check  = Auth::guard('nhan_vien')->check();
        if($check) {
            $user = Auth::guard('nhan_vien')->user();
            if($user->is_open && $user->is_tai_khoan) {
                return $next($request);
            } else {
                Auth::guard('nhan_vien')->logout();
                if($user->is_open == 0) {
                    toastr()->warning('Tài khoản của bạn đã bị khoá!');
                }
                if($user->is_tai_khoan == 0) {
                    toastr()->warning('Tài khoản của bạn không hợp lệ!');
                }
                return redirect('/login');
            }
        } else {
            toastr()->error('Vui lòng đăng nhập hệ thống!');
            return redirect('/login');
        }

    }
}
