<?php

namespace App\Helpers;

use Carbon\Carbon;

class DashboardHelper
{
    /**
     * Hitung persentase pertumbuhan antara dua nilai
     * 
     * @param int|float $current
     * @param int|float $previous
     * @return float
     */
    public static function calculateGrowthPercentage($current, $previous)
    {
        if ($previous == 0) {
            return $current > 0 ? 100 : 0;
        }
        
        return round((($current - $previous) / $previous) * 100, 2);
    }

    /**
     * Format angka dengan separator
     * 
     * @param int|float $number
     * @return string
     */
    public static function formatNumber($number)
    {
        return number_format($number, 0, ',', '.');
    }

    /**
     * Dapatkan label pertumbuhan dengan arrow
     * 
     * @param float $percentage
     * @return string
     */
    public static function getGrowthLabel($percentage)
    {
        if ($percentage > 0) {
            return "▲ {$percentage}%";
        } elseif ($percentage < 0) {
            return "▼ " . abs($percentage) . "%";
        } else {
            return "— 0%";
        }
    }

    /**
     * Dapatkan class CSS berdasarkan pertumbuhan
     * 
     * @param float $percentage
     * @return string
     */
    public static function getGrowthClass($percentage)
    {
        if ($percentage > 0) {
            return 'up';
        } elseif ($percentage < 0) {
            return 'down';
        } else {
            return 'neutral';
        }
    }

    /**
     * Dapatkan statistik untuk periode tertentu
     * 
     * @param string $modelClass - Nama model class
     * @param string $period - 'today', 'week', 'month', 'year'
     * @return int
     */
    public static function getStatsByPeriod($modelClass, $period = 'month')
    {
        $query = $modelClass::query();
        
        switch ($period) {
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'week':
                $query->whereBetween('created_at', [
                    Carbon::now()->startOfWeek(),
                    Carbon::now()->endOfWeek()
                ]);
                break;
            case 'month':
                $query->whereMonth('created_at', Carbon::now()->month)
                      ->whereYear('created_at', Carbon::now()->year);
                break;
            case 'year':
                $query->whereYear('created_at', Carbon::now()->year);
                break;
        }
        
        return $query->count();
    }

    /**
     * Bandingkan data antara dua periode
     * 
     * @param string $modelClass
     * @param string $currentPeriod
     * @param string $previousPeriod
     * @return array
     */
    public static function comparePeriods($modelClass, $currentPeriod = 'month', $previousPeriod = 'month')
    {
        $current = self::getStatsByPeriod($modelClass, $currentPeriod);
        $previous = self::getStatsByPeriod($modelClass, $previousPeriod);
        $growth = self::calculateGrowthPercentage($current, $previous);
        
        return [
            'current' => $current,
            'previous' => $previous,
            'growth' => $growth,
            'label' => self::getGrowthLabel($growth),
            'class' => self::getGrowthClass($growth)
        ];
    }

    /**
     * Dapatkan trend data untuk chart
     * 
     * @param string $modelClass
     * @param int $days
     * @return array
     */
    public static function getTrendData($modelClass, $days = 30)
    {
        $data = [];
        $labels = [];
        
        for ($i = $days; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $count = $modelClass::whereDate('created_at', $date)->count();
            
            $labels[] = $date->format('d M');
            $data[] = $count;
        }
        
        return [
            'labels' => $labels,
            'data' => $data
        ];
    }
}
