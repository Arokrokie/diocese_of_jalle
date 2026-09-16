<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Sermon;
use App\Models\Event;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $postsCount = Post::count();
        $sermonsCount = Sermon::count();
        $eventsCount = Event::count();
        $unreadMessagesCount = ContactMessage::where('is_read', false)->count();

        $recentPosts = Post::orderBy('created_at', 'desc')->take(5)->get();
        $recentMessages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'postsCount',
            'sermonsCount',
            'eventsCount',
            'unreadMessagesCount',
            'recentPosts',
            'recentMessages'
        ));
    }
}
