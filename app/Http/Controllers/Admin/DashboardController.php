<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Nanti bisa ambil data dari database
        $stats = [
            'kunjungan' => 7265,
            'produk_masuk' => 3671,
            'produk_keluar' => 256,
            'pengguna_baru' => 2318,
        ];

        return view('admin.dashboard.index', compact('stats'));
    }
}
