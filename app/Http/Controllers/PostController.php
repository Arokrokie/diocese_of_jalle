<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Throwable;

class PostController extends Controller
{
    public function index()
    {
        try {
            $posts = Post::where('is_published', true)
                ->orderBy('published_at', 'desc')
                ->paginate(9);
        } catch (Throwable $e) {
            $posts = new LengthAwarePaginator([], 0, 9);
        }

        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        try {
            $post = Post::where('slug', $slug)
                ->where('is_published', true)
                ->firstOrFail();

            $recentPosts = Post::where('is_published', true)
                ->where('id', '!=', $post->id)
                ->orderBy('published_at', 'desc')
                ->take(4)
                ->get();
        } catch (Throwable $e) {
            abort(404);
        }

        return view('posts.show', compact('post', 'recentPosts'));
    }
}
