<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Internship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocialController extends Controller
{
    public function index()
    {
        $store = Store::first();
        if (!$store) {
            $store = Store::create([
                'whatsapp' => '+6285942001720',
                'instagram' => 'authorized_servicecenter.tegal',
                'tiktok' => '@authorized_servicecenter'
            ]);
        }

        $batchImage = Internship::batch()->first();
        $brochures = Internship::brochure()->get();

        return view('admin.social.index', compact('store', 'batchImage', 'brochures'));
    }

    public function updateStore(Request $request)
    {
        $validated = $request->validate([
            'whatsapp' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
        ]);

        $store = Store::first();
        if (!$store) {
            $store = Store::create($validated);
        } else {
            $store->update($validated);
        }

        return redirect()->route('admin.social.index')
            ->with('success', 'Store details updated successfully');
    }

    public function updateBatchImage(Request $request)
    {
        $request->validate([
            'batch_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $batchImage = Internship::batch()->first();

        if ($request->hasFile('batch_image')) {
            // Delete old image if exists and not the default intern1.jpg
            if ($batchImage && $batchImage->image_url) {
                $oldPath = str_replace('/storage/', '', $batchImage->image_url);
                if (!str_contains($oldPath, 'intern1.jpg')) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            // Store new image
            $path = $request->file('batch_image')->store('internship/batch', 'public');
            $imageUrl = Storage::url($path);

            if ($batchImage) {
                $batchImage->update(['image_url' => $imageUrl]);
            } else {
                Internship::create([
                    'type' => 'batch',
                    'image_url' => $imageUrl,
                    'title' => 'Batch Magang'
                ]);
            }
        }

        return redirect()->route('admin.social.index')
            ->with('success', 'Batch image updated successfully');
    }

    public function addBrochure(Request $request)
    {
        $request->validate([
            'brochure_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'brochure_title' => 'nullable|string|max:255'
        ]);

        if ($request->hasFile('brochure_image')) {
            $path = $request->file('brochure_image')->store('internship/brochure', 'public');
            $imageUrl = Storage::url($path);

            $maxOrder = Internship::brochure()->max('order') ?? 0;

            Internship::create([
                'type' => 'brochure',
                'image_url' => $imageUrl,
                'title' => $request->brochure_title,
                'order' => $maxOrder + 1
            ]);
        }

        return redirect()->route('admin.social.index')
            ->with('success', 'Brochure added successfully');
    }

    public function deleteBrochure($id)
    {
        $brochure = Internship::brochure()->findOrFail($id);

        // Delete image from storage
        $path = str_replace('/storage/', '', $brochure->image_url);
        Storage::disk('public')->delete($path);

        $brochure->delete();

        return redirect()->route('admin.social.index')
            ->with('success', 'Brochure deleted successfully');
    }
}