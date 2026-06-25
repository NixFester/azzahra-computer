<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'nomor_tiket',
        'nama',
        'whatsapp',
        'cabang',
        'jenis_device',
        'merk',
        'keluhan',
        'foto',
        'status_tiket',
    ];

    /**
     * Generate nomor tiket otomatis: SC-YYYYMMDD-XXXXX
     */
    public static function generateNomorTiket(): string
    {
        $tanggal = now()->format('Ymd');
        $prefix  = 'SC-' . $tanggal . '-';

        $last = self::where('nomor_tiket', 'like', $prefix . '%')
            ->orderByDesc('id')
            ->first();

        $urutan = $last
            ? (int) substr($last->nomor_tiket, -5) + 1
            : 1;

        return $prefix . str_pad($urutan, 5, '0', STR_PAD_LEFT);
    }
}