<?php

namespace App\Http\Controllers;

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
                    'image' => asset('images/farhan.jpg'),
                    'rating' => 5,
                    'review' => 'Pelayanan oke, Staff ramah dan informatif, layar bergaris garansi Asus full cover juga tanpa bayar. Sekalian saya tambah cleaning + ganti thermal pasta 300 ribu, laptop adem lagi 👍. Makasih Azzahra Computer 🙏',
                ],
                [
                    'name' => 'Khalim Mahfud',
                    'image' => asset('images/khalim.jpg'),
                    'rating' => 5,
                    'review' => 'Baru pertama kali klaim kerusakan HP, merk Motorola dan disini alhamdulillah dibantu maksimal sekali sampai ganti unit baru. Jarak waktu klaim 5 harian. Pelayanannya oke, CS nya ramah & solutif. Keren! Tegal nih, laka-laka.',
                ],
                [
                    'name' => 'eL Ka',
                    'image' => asset('images/avatar/eLka.jpg'),
                    'rating' => 5,
                    'review' => 'Mantap Servis TAB sy yg ngehang disini benar² bisa Garansi Full Rp,0,- dan Pelayanan Ramah serta Komunikatif, Waktu pengerjaan jg hari Libur Nasional tetap Melayani (kec. Minggu. ) Estimasi pengerjaan lebih cepat dari janjinya, ToP pokoke',
                ],
                [
                    'name' => 'farrah fauzia',
                    'image' => null,
                    'rating' => 5,
                    'review' => 'Pelayanan mantap,after sales wet vacume dreame masih garansi,sehabis dservis,mesin seperti baru lagi,Tegal laptop store n service center top markotop.',
                ],
                [
                    'name' => 'APIP RAMADAN',
                    'image' => null,
                    'rating' => 5,
                    'review' => 'TEGAL LAPTOP STORE DAN SERVICE CENTER TEGAL memang luar biasa,pelayanannya ramah dan cepat,informasi jelas,garansi panjang dan hadiahnya menarik.buat teman -teman yang punya masalah dengan laptopnya bisa langsung ke TEGA...',
                ],

            ],
        ];
    }
}
