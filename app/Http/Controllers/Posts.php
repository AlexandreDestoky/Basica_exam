<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class Posts extends Controller
{
  /**
   * Affichage des posts dans la page "blog" avec limite au choix + pagination
   */
  public function index(int $limit = 4)
  {
    $posts = Post::orderBy('created_at', 'DESC')
      ->paginate($limit);
    return view('blog.index', compact('posts'));
  }

  /**
   * Affichage d'un post en particulier
   */
  public function show(Post $post)
  {
    return view('posts._blog_posts_show', compact('post'));
  }
}
