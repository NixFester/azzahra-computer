<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(20);
        return view('admin.service.index', compact('services'));
    }

    public function show(Service $service)
    {
        return view('admin.service.show', compact('service'));
    }

    public function updateStatus(Request $request, Service $service)
    {
        $request->validate([
            'status_tiket' => 'required|in:Menunggu,Diproses,Selesai,Ditolak',
        ]);

        $service->update(['status_tiket' => $request->status_tiket]);

        return back()->with('success', 'Status tiket berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        if ($service->foto) {
            \Storage::disk('public')->delete($service->foto);
        }
        $service->delete();

        return redirect()->route('admin.service.index')
            ->with('success', 'Data tiket berhasil dihapus.');
    }
}