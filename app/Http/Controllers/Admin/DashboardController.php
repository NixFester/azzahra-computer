<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Iklan;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data real dari database dengan perhitungan growth otomatis
        $stats = $this->calculateStats();

        // Data untuk recent items
        $recentProducts = Product::latest('id')->take(5)->get();
        $recentBlogs = Blog::latest('id')->take(5)->get();
        $recentVisitors = DB::table('visitors')->distinct()->count('ip_address');

        return view('admin.dashboard.index', compact('stats', 'recentProducts' , 'recentBlogs', 'recentVisitors'));
    

        return view('admin.dashboard.index');
    }

    /**
     * Hitung statistik dari database
     *
     * @return array
     */
    private function calculateStats()
    {
        // Total counts
        $totalProducts = Product::count();
        $totalVisitors = DB::table('visitors')->distinct()->count('ip_address');
        $totalBlogs = Blog::count();
        $activeIklan = Iklan::where('is_active', true)->count();


        return [
            'kunjungan' => $totalVisitors,
            'produk_keluar' => $totalProducts,
            'total_blogs' => $totalBlogs,
            'active_iklan' => $activeIklan,
        ];
    }

    /**
     * Dapatkan count untuk bulan ini
     *
     * @param  string  $table
     * @return int
     */
    private function getMonthlyCount($table)
    {
        return ;
    }

    /**
     * Dapatkan count untuk bulan lalu
     *
     * @param  string  $table
     * @return int
     */
    private function getLastMonthCount($table)
    {
        return ;
    }

    /**
     * Hitung persentase pertumbuhan
     *
     * @param  int  $current
     * @param  int  $previous
     * @return float
     */
    private function calculateGrowth($current, $previous)
    {
        if ($previous == 0) {
            return $current > 0 ? 100 : 0;
        }

        return round((($current - $previous) / $previous) * 100, 2);
    }
}
