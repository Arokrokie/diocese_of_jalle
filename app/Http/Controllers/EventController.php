<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Throwable;

class EventController extends Controller
{
    public function index()
    {
        try {
            $events = Event::orderBy('start_date', 'asc')->paginate(9);
        } catch (Throwable $e) {
            $events = new LengthAwarePaginator([], 0, 9);
        }

        return view('events.index', compact('events'));
    }

    public function show($slug)
    {
        try {
            $event = Event::where('slug', $slug)->firstOrFail();
            $upcomingEvents = Event::where('id', '!=', $event->id)
                ->where('start_date', '>=', now()->toDateString())
                ->orderBy('start_date', 'asc')
                ->take(3)
                ->get();
        } catch (Throwable $e) {
            abort(404);
        }

        return view('events.show', compact('event', 'upcomingEvents'));
    }
}
