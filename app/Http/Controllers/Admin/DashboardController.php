<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Iklan;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data real dari database dengan perhitungan growth otomatis
        $stats = $this->calculateStats();

        // Data untuk recent items


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
        $totalUsers = User::count();
        $totalBlogs = Blog::count();
        $activeIklan = Iklan::where('is_active', true)->count();

        // Data per bulan
        $usersThisMonth = $this->getMonthlyCount('users');
        $usersLastMonth = $this->getLastMonthCount('users');

        $productsThisMonth = $this->getMonthlyCount('products');
        $productsLastMonth = $this->getLastMonthCount('products');

        // Hitung persentase pertumbuhan
        $userGrowth = $this->calculateGrowth($usersThisMonth, $usersLastMonth);
        $productGrowth = $this->calculateGrowth($productsThisMonth, $productsLastMonth);

        return [
            'kunjungan' => $totalUsers,
            'produk_masuk' => $productsThisMonth,
            'produk_keluar' => $totalProducts,
            'pengguna_baru' => $usersThisMonth,
            'total_blogs' => $totalBlogs,
            'active_iklan' => $activeIklan,
            'user_growth' => $userGrowth,
            'product_growth' => $productGrowth,
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
