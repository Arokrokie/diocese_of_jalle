<?php

namespace App\Http\Controllers;

use App\Models\Sermon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Throwable;

class SermonController extends Controller
{
    public function index()
    {
        try {
            $sermons = Sermon::orderBy('sermon_date', 'desc')->paginate(9);
        } catch (Throwable $e) {
            $sermons = new LengthAwarePaginator([], 0, 9);
        }

        return view('sermons.index', compact('sermons'));
    }

    public function show($slug)
    {
        try {
            $sermon = Sermon::where('slug', $slug)->firstOrFail();
            $recentSermons = Sermon::where('id', '!=', $sermon->id)
                ->orderBy('sermon_date', 'desc')
                ->take(4)
                ->get();
        } catch (Throwable $e) {
            abort(404);
        }

        return view('sermons.show', compact('sermon', 'recentSermons'));
    }
}
