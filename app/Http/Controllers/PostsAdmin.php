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

  public function addForm()
  {
    return view('postsAdmin._postsAdmin_addForm');
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

  public function editForm(Post $post)
  {
    return view('postsAdmin._postsAdmin_editForm', compact('post'));
  }

  public function update(Request $request, Post $post)
  {
    $request->validate([
      'title' => 'required',
      'content' => 'required',
      'image' => 'required',
      'categorie_id' => 'required'
    ]);

    $post->update($request->all());
    return redirect()->route('postsAdmin.index');
  }

  public function destroy(Post $post)
  {
    $post->delete();
    return redirect()->route('postsAdmin.index');
  }
}
