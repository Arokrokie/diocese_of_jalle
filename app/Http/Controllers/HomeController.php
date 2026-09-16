<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Sermon;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $featuredSermon = Sermon::orderBy('sermon_date', 'desc')->first();

        $events = Event::where('start_date', '>=', now()->toDateString())
            ->orderBy('start_date', 'asc')
            ->take(2)
            ->get();

        return view('pages.home', compact('posts', 'featuredSermon', 'events'));
    }
}
