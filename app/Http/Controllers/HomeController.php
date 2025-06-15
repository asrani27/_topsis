<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Perusahaan;
use App\Models\Skpd;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function superadmin()
    {
        return view('superadmin.home');
    }
}
