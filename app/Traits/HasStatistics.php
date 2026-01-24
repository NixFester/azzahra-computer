<?php

namespace App\Traits;

use Carbon\Carbon;

/**
 * Trait untuk menambahkan statistik dan analytics ke model
 * 
 * Usage: Tambahkan di model dengan "use HasStatistics;"
 */
trait HasStatistics
{
    /**
     * Dapatkan jumlah records bulan ini
     * 
     * @return int
     */
    public function getThisMonthCount()
    {
        return static::whereMonth('created_at', Carbon::now()->month)
                     ->whereYear('created_at', Carbon::now()->year)
                     ->count();
    }

    /**
     * Dapatkan jumlah records bulan lalu
     * 
     * @return int
     */
    public function getLastMonthCount()
    {
        return static::whereMonth('created_at', Carbon::now()->subMonth()->month)
                     ->whereYear('created_at', Carbon::now()->subMonth()->year)
                     ->count();
    }

    /**
     * Hitung pertumbuhan bulan ini vs bulan lalu
     * 
     * @return float
     */
    public function getMonthlyGrowth()
    {
        $current = $this->getThisMonthCount();
        $previous = $this->getLastMonthCount();
        
        if ($previous == 0) {
            return $current > 0 ? 100 : 0;
        }
        
        return round((($current - $previous) / $previous) * 100, 2);
    }

    /**
     * Dapatkan total records hari ini
     * 
     * @return int
     */
    public function getTodayCount()
    {
        return static::whereDate('created_at', Carbon::today())->count();
    }

    /**
     * Dapatkan records minggu ini
     * 
     * @return int
     */
    public function getThisWeekCount()
    {
        return static::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();
    }

    /**
     * Dapatkan records tahun ini
     * 
     * @return int
     */
    public function getThisYearCount()
    {
        return static::whereYear('created_at', Carbon::now()->year)->count();
    }

    /**
     * Scope query untuk periode tertentu
     * 
     * @param $query
     * @param string $period
     * @return mixed
     */
    public function scopeByPeriod($query, $period = 'month')
    {
        switch ($period) {
            case 'today':
                return $query->whereDate('created_at', Carbon::today());
            case 'week':
                return $query->whereBetween('created_at', [
                    Carbon::now()->startOfWeek(),
                    Carbon::now()->endOfWeek()
                ]);
            case 'month':
                return $query->whereMonth('created_at', Carbon::now()->month)
                             ->whereYear('created_at', Carbon::now()->year);
            case 'year':
                return $query->whereYear('created_at', Carbon::now()->year);
            default:
                return $query;
        }
    }

    /**
     * Scope query untuk 30 hari terakhir
     * 
     * @param $query
     * @param int $days
     * @return mixed
     */
    public function scopeLast($query, $days = 30)
    {
        return $query->where('created_at', '>=', Carbon::now()->subDays($days));
    }
}
