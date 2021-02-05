<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class Posts extends Controller
{
  public function index(int $limit = 4)
  {
    $posts = Post::orderBy('created_at', 'DESC')
      ->paginate($limit);
    return view('blog.index', compact('posts'));
  }

  public function show(Post $post)
  {
    return view('posts._blog_posts_show', compact('post'));
  }
}
