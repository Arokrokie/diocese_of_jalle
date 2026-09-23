<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Throwable;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status', 'all');
        $today = now()->startOfDay()->toDateString();

        try {
            $query = Event::query();

            if ($status === 'upcoming') {
                $query->where(function ($q) use ($today) {
                    $q->where('start_date', '>=', $today)
                      ->orWhere('end_date', '>=', $today);
                })->orderBy('start_date', 'asc');
            } elseif ($status === 'completed') {
                $query->where(function ($q) use ($today) {
                    $q->where(function ($sub) use ($today) {
                        $sub->whereNull('end_date')->where('start_date', '<', $today);
                    })->orWhere('end_date', '<', $today);
                })->orderBy('start_date', 'desc');
            } else {
                $query->orderBy('start_date', 'desc');
            }

            $events = $query->paginate(9);

            $upcomingCount = Event::where(function ($q) use ($today) {
                $q->where('start_date', '>=', $today)
                  ->orWhere('end_date', '>=', $today);
            })->count();

            $completedCount = Event::where(function ($q) use ($today) {
                $q->where(function ($sub) use ($today) {
                    $sub->whereNull('end_date')->where('start_date', '<', $today);
                })->orWhere('end_date', '<', $today);
            })->count();

        } catch (Throwable $e) {
            $events = new LengthAwarePaginator([], 0, 9);
            $upcomingCount = 0;
            $completedCount = 0;
        }

        return view('events.index', compact('events', 'status', 'upcomingCount', 'completedCount'));
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
