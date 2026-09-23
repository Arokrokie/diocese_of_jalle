<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sermon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SermonController extends Controller
{
    public function index()
    {
        $sermons = Sermon::orderBy('sermon_date', 'desc')->paginate(15);
        return view('admin.sermons.index', compact('sermons'));
    }

    public function create()
    {
        return view('admin.sermons.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'preacher'    => 'required|string|max:255',
            'scripture'   => 'nullable|string|max:255',
            'sermon_date' => 'required|date',
            'description' => 'nullable|string',
            'notes'       => 'nullable|string',
        ]);

        Sermon::create([
            'title'       => $validated['title'],
            'slug'        => Str::slug($validated['title']) . '-' . Str::random(5),
            'preacher'    => $validated['preacher'],
            'scripture'   => $validated['scripture'] ?? null,
            'sermon_date' => $validated['sermon_date'],
            'description' => $validated['description'] ?? null,
            'notes'       => $validated['notes'] ?? null,
            'audio_url'   => null,
            'video_url'   => null,
            'image'       => null,
        ]);

        return redirect()->route('admin.sermons.index')->with('success', 'Sermon created successfully.');
    }

    public function edit(Sermon $sermon)
    {
        return view('admin.sermons.edit', compact('sermon'));
    }

    public function update(Request $request, Sermon $sermon)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'preacher'    => 'required|string|max:255',
            'scripture'   => 'nullable|string|max:255',
            'sermon_date' => 'required|date',
            'description' => 'nullable|string',
            'notes'       => 'nullable|string',
        ]);

        $sermon->update([
            'title'       => $validated['title'],
            'preacher'    => $validated['preacher'],
            'scripture'   => $validated['scripture'] ?? null,
            'sermon_date' => $validated['sermon_date'],
            'description' => $validated['description'] ?? null,
            'notes'       => $validated['notes'] ?? null,
        ]);

        return redirect()->route('admin.sermons.index')->with('success', 'Sermon updated successfully.');
    }

    public function destroy(Sermon $sermon)
    {
        if ($sermon->image && Storage::disk('public')->exists($sermon->image)) {
            Storage::disk('public')->delete($sermon->image);
        }
        $sermon->delete();

        return redirect()->route('admin.sermons.index')->with('success', 'Sermon deleted successfully.');
    }
}
