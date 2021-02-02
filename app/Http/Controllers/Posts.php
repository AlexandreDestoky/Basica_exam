<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class Posts extends Controller
{
  public function index(int $limit = 4) {
    $posts = Post::orderBy('created_at', 'DESC')
                ->take($limit)
                ->get();
    return view('blog.index', compact('posts'));
}
}
