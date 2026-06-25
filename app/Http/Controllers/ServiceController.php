<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function create()
    {
        return view('pages.service');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'         => 'required|string|max:255',
            'whatsapp'     => 'required|string|max:20',
            'cabang'       => 'required|in:Tegal,Cibubur,Kampus Saintek,Kampus PKTJ',
            'jenis_device' => 'required|in:Laptop,PC,Printer,Vacuum Robot,Smartphone,Lainnya',
            'merk'         => 'required|string|max:255',
            'keluhan'      => 'required|string',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'nama.required'         => 'Nama lengkap wajib diisi.',
            'whatsapp.required'     => 'Nomor WhatsApp wajib diisi.',
            'cabang.required'       => 'Pilih cabang terlebih dahulu.',
            'jenis_device.required' => 'Pilih jenis perangkat.',
            'merk.required'         => 'Merk perangkat wajib diisi.',
            'keluhan.required'      => 'Keluhan wajib diisi.',
            'foto.image'            => 'File harus berupa gambar.',
            'foto.max'              => 'Ukuran foto maksimal 5MB.',
        ]);

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('service-photos', 'public');
        }

        // Generate nomor tiket
        $validated['nomor_tiket'] = Service::generateNomorTiket();

        $service = Service::create($validated);

        return redirect()->route('service.sukses', ['tiket' => $service->nomor_tiket]);
    }

    public function sukses(Request $request)
    {
        $tiket = $request->query('tiket');

        if (!$tiket) {
            return redirect()->route('service.create');
        }

        return view('pages.service-sukses', compact('tiket'));
    }
}