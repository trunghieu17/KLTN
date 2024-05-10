<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhanChiaCaController extends Controller
{
    public function index()
    {
        return view('page.phan_ca_lam.index');
    }
}
