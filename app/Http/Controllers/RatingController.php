<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class RatingController extends Controller
{
    public function getRatings(): array
    {
        return [
            'summary' => [
                'score' => '4,8',
                'stars' => 5,
                'reviews' => 8218,
            ],
            'reviews' => [
                [
                    'name' => 'Pulafa Pulafa',
                    'image' => null,
                    'rating' => 5,
                    'review' => 'Pelayanan sangat baik, staff ramah. Mereka menemukan bahwa masalahnya adalah konflik driver yang sangat spesifik setelah update BIOS. Selama proses perbaikan, mereka secara proaktif memberikan update melalui WhatsApp...',
                ],
                [
                    'name' => 'Farhan Denta',
                    'image' => asset('images/farhan.png'),
                    'rating' => 5,
                    'review' => 'Pelayanan oke, Staff ramah dan informatif, layar bergaris garansi Asus full cover juga tanpa bayar. Sekalian saya tambah cleaning + ganti thermal pasta 300 ribu, laptop adem lagi 👍. Makasih Azzahra Computer 🙏',
                ],
                [
                    'name' => 'Khalim Mahfud',
                    'image' => asset('images/khalim.png'),
                    'rating' => 5,
                    'review' => 'Baru pertama kali klaim kerusakan HP, merk Motorola dan disini alhamdulillah dibantu maksimal sekali sampai ganti unit baru. Jarak waktu klaim 5 harian. Pelayanannya oke, CS nya ramah & solutif. Keren! Tegal nih, laka-laka.',
                ],
                 [
                    'name' => 'Khalim Mahfud',
                    'image' => asset('images/khalim.png'),
                    'rating' => 5,
                    'review' => 'Baru pertama kali klaim kerusakan HP, merk Motorola dan disini alhamdulillah dibantu maksimal sekali sampai ganti unit baru. Jarak waktu klaim 5 harian. Pelayanannya oke, CS nya ramah & solutif. Keren! Tegal nih, laka-laka.',
                ],
                
            ]
        ];
    }
}
