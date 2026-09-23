<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $items = Gallery::orderBy('sort_order', 'asc')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.gallery.index', compact('items'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'caption' => 'nullable|string',
            'event_date' => 'nullable|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'is_published' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('gallery', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        $validated['is_published'] = $request->has('is_published');
        Gallery::create($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Photo added to gallery successfully.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'caption' => 'nullable|string',
            'event_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'is_published' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('gallery', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        $validated['is_published'] = $request->has('is_published');
        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery photo updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Photo deleted successfully.');
    }
}
