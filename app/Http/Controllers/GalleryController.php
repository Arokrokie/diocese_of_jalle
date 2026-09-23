<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Throwable;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->query('category', 'all');

        try {
            $query = Gallery::where('is_published', true);

            if ($selectedCategory !== 'all') {
                $query->where('category', $selectedCategory);
            }

            $items = $query->orderBy('sort_order', 'asc')
                ->orderBy('created_at', 'desc')
                ->paginate(12);

            $categories = Gallery::where('is_published', true)
                ->pluck('category')
                ->unique()
                ->filter()
                ->values();
        } catch (Throwable $e) {
            $items = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 12);
            $categories = collect(['Episcopal Ministry', 'Mothers\' Union', 'Worship & Choir', 'Youth', 'Community Fellowship']);
        }

        return view('pages.gallery', compact('items', 'categories', 'selectedCategory'));
    }
}
