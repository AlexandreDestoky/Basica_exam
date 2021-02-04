<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsAdmin extends Controller
{
  //
  public function index()
  {
    $posts = Post::orderBy('created_at', 'DESC')
      ->get();
    return view('postsAdmin.index', compact('posts'));
  }

  public function form()
  {
    return view('postsAdmin._postsAdmin_form');
  }


  public function insert(Request $request)
  {

      $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'categorie_id' => 'required'
      ]);

      if ($request->hasFile('image')) :
        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('posts/images', $imageName);
        $request->image->move(public_path('assets/img/blog'), $imageName);

      else :
        $imageName = '';
      endif;

    Post::create($request->only(['title', 'content', 'categorie_id']) + ['image' => $imageName]);
    return redirect()->route('postsAdmin.index');
  }
}
$tags = \App\Models\Tag::orderBy('name', 'ASC')->get(); $tags = \App\Models\Tag::orderBy('name', 'ASC')->get();