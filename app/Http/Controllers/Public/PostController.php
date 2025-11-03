<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('post_type', 'news')
            ->where('status', 'published')
            ->latest()
            ->paginate(9); // Phân trang, 9 bài/trang
        return view('posts.index', compact('posts'));
    }
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail(); // Lỗi 404 nếu không thấy
        return view('posts.show', compact('post'));
    }
}
