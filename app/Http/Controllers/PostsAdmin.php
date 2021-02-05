<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsAdmin extends Controller
{
  /**
   * affichage de la liste des post
   */
  public function index()
  {
    $posts = Post::orderBy('created_at', 'DESC')
      ->get();
    return view('postsAdmin.index', compact('posts'));
  }


  /**
   * retourne vue formulaire d'ajout d'un post
   */
  public function addForm()
  {
    return view('postsAdmin._postsAdmin_addForm');
  }


  /**
   * insert d'un post
   */
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


  /**
   * retourne vue d'édition d'un post
   */
  public function editForm(Post $post)
  {
    return view('postsAdmin._postsAdmin_editForm', compact('post'));
  }


  /**
   * update d'un post
   */
  public function update(Request $request, Post $post)
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
      $post->update($request->only(['title', 'content', 'categorie_id']) + ['image' => $imageName]);
    else :
      $post->update($request->only(['title', 'content', 'categorie_id']));
    endif;

    return redirect()->route('postsAdmin.index');
  }


  /**
   * delete d'un post
   */
  public function destroy(Post $post)
  {
    $post->delete();
    return redirect()->route('postsAdmin.index');
  }
}
