<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = Gallery::orderBy('sort_order', 'asc')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.gallery.index', compact('photos'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'category'   => 'nullable|string|max:100',
            'caption'    => 'nullable|string',
            'event_date' => 'nullable|date',
            'sort_order' => 'nullable|integer',
            'image_file' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
        ]);

        $data = [
            'title'        => $validated['title'],
            'category'     => $validated['category'] ?? null,
            'caption'      => $validated['caption'] ?? null,
            'event_date'   => $validated['event_date'] ?? null,
            'sort_order'   => $validated['sort_order'] ?? 0,
            'is_published' => $request->has('is_published'),
        ];

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('gallery', 'public');
            $data['image'] = $path;
        }

        Gallery::create($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Photo added to gallery successfully.');
    }

    public function show(Gallery $gallery)
    {
        // Redirect show to edit for admin
        return redirect()->route('admin.gallery.edit', $gallery);
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title'      => 'required|string|max:255',
            'category'   => 'nullable|string|max:100',
            'caption'    => 'nullable|string',
            'event_date' => 'nullable|date',
            'sort_order' => 'nullable|integer',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
        ]);

        $data = [
            'title'        => $validated['title'],
            'category'     => $validated['category'] ?? null,
            'caption'      => $validated['caption'] ?? null,
            'event_date'   => $validated['event_date'] ?? null,
            'sort_order'   => $validated['sort_order'] ?? 0,
            'is_published' => $request->has('is_published'),
        ];

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('gallery', 'public');
            $data['image'] = $path;
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery photo updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Photo deleted successfully.');
    }
}
