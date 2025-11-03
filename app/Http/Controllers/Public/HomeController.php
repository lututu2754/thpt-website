<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featured_posts = Post::where('post_type', 'news')
            ->where('status', 'published')
            ->latest()
            ->take(3)
            ->get();
        return view('home', compact('featured_posts'));
    }
}
