<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(10);

        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'alt_text' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
    $file = $request->file('image');
    $baseSlug = Str::slug($validated['title']);
    $extension = $file->getClientOriginalExtension();
    $filename = $baseSlug . '.' . $extension;
    $counter = 1;
        while (Storage::disk('public')->exists('blogs/' . $filename)) {
    $counter++;
    $filename = $baseSlug . '-' . $counter . '.' . $extension;
    }
    $validated['image'] = $file->storeAs('blogs', $filename, 'public');
    }

        Blog::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil dibuat.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'alt_text' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Hapus foto lama kalau ada
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
        $file = $request->file('image');
        $baseSlug = Str::slug($validated['title']);
        $extension = $file->getClientOriginalExtension();
        $filename = $baseSlug . '.' . $extension;
        $counter = 1;
         while (Storage::disk('public')->exists('blogs/' . $filename)) {
        $counter++;
        $filename = $baseSlug . '-' . $counter . '.' . $extension;
        }
        $validated['image'] = $file->storeAs('blogs', $filename, 'public');
        }

        $blog->update($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil diperbarui.');
    }

    public function destroy(Blog $blog)
    {
        // Hapus foto saat blog dihapus
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil dihapus.');
    }}