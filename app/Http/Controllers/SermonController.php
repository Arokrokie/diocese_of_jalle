<?php

namespace App\Http\Controllers;

use App\Models\Sermon;
use Illuminate\Http\Request;

class SermonController extends Controller
{
    public function index()
    {
        $sermons = Sermon::orderBy('sermon_date', 'desc')->paginate(9);
        return view('sermons.index', compact('sermons'));
    }

    public function show($slug)
    {
        $sermon = Sermon::where('slug', $slug)->firstOrFail();
        $recentSermons = Sermon::where('id', '!=', $sermon->id)
            ->orderBy('sermon_date', 'desc')
            ->take(3)
            ->get();

        return view('sermons.show', compact('sermon', 'recentSermons'));
    }
}
