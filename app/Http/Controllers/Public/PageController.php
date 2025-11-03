<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Post::where('slug', $slug)
            ->where('post_type', 'page') // Lấy bài viết loại 'page'
            ->where('status', 'published')
            ->firstOrFail();
        // Chúng ta sẽ dùng chung view 'posts.show'
        return view('posts.show', ['post' => $page]);
    }
}
