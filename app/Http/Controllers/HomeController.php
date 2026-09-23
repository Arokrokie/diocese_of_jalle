<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Sermon;
use App\Models\Event;
use Illuminate\Http\Request;
use Throwable;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $posts = Post::where('is_published', true)
                ->orderBy('published_at', 'desc')
                ->take(3)
                ->get();
        } catch (Throwable $e) {
            $posts = collect();
        }

        try {
            $featuredSermon = Sermon::orderBy('sermon_date', 'desc')->first();
        } catch (Throwable $e) {
            $featuredSermon = null;
        }

        try {
            $events = Event::where('start_date', '>=', now()->toDateString())
                ->orderBy('start_date', 'asc')
                ->take(2)
                ->get();
        } catch (Throwable $e) {
            $events = collect();
        }

        return view('pages.home', compact('posts', 'featuredSermon', 'events'));
    }
}
