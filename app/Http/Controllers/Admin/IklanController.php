<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Iklan;
use App\Traits\CompressesImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IklanController extends Controller
{
    use CompressesImages;

    public function index()
    {
        $banners = Iklan::where('type', 'banner')
            ->orderBy('order')
            ->get();

        $promos = Iklan::where('type', 'promo')
            ->orderBy('order')
            ->get();

        $brands = Iklan::where('type', 'brand')
            ->orderBy('order')
            ->get();

        return view('admin.iklan.index', compact('banners', 'promos', 'brands'));
    }

    public function create()
    {
        return view('admin.iklan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:banner,promo,brand',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'link' => 'nullable|url',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $this->compressAndStore($request->file('image'), 'iklans');
        }

        Iklan::create($validated);

        return redirect()->route('admin.iklan.index')
            ->with('success', 'Iklan berhasil ditambahkan');
    }

    public function edit(Iklan $iklan)
    {
        return view('admin.iklan.edit', compact('iklan'));
    }

    public function update(Request $request, Iklan $iklan)
    {
        $validated = $request->validate([
            'type' => 'required|in:banner,promo,brand',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'link' => 'nullable|url',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($iklan->image_path) {
                Storage::disk('public')->delete($iklan->image_path);
            }

            $validated['image_path'] = $this->compressAndStore($request->file('image'), 'iklans');

        }

        $iklan->update($validated);

        return redirect()->route('admin.iklan.index')
            ->with('success', 'Iklan berhasil diupdate');
    }

    public function destroy(Iklan $iklan)
    {
        if ($iklan->image_path) {
            Storage::disk('public')->delete($iklan->image_path);
        }

        $iklan->delete();

        return redirect()->route('admin.iklan.index')
            ->with('success', 'Iklan berhasil dihapus');
    }
}
