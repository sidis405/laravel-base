<?php

namespace App\Http\Controllers;

use App\Post;
use App\Events\PostWasUpdated;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::with('author', 'category', 'tags')->orderBy('published', 'ASC')->latest()->paginate(10);

        return view('dashboard')->withPosts($posts);
    }

    public function status(Post $post)
    {
        $post->update(['published' => request('published')]);

        event(new PostWasUpdated($post));

        return redirect()->back();
    }
}
