<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class WorksAdmin extends Controller
{
  /**
   * Affichage de la liste des works
   */
  public function index()
  {
    $works = Work::orderBy('created_at', 'DESC')
      ->get();
    return view('worksAdmin.index', compact('works'));
  }


  /**
   * retourne vue formulaire d'ajout d'un work
   */
  public function addForm()
  {
    return view('worksAdmin._worksAdmin_addForm');
  }


  /**
   * Insert d'un work
   */
  public function insert(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'content' => 'required',
      'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'inSlider' => 'required',
      'client_id' => 'required'
    ]);

    if ($request->hasFile('image')) :
      $imageName = time() . '.' . $request->image->extension();
      $request->image->storeAs('works/images', $imageName);
      $request->image->move(public_path('assets/img/portfolio'), $imageName);

    else :
      $imageName = '';
    endif;

    Work::create($request->only(['title', 'content', 'inSlider', 'client_id']) + ['image' => $imageName])->tags()->sync($request->tags);
    return redirect()->route('worksAdmin.index');
  }


  /**
   * retourne vue d'édition d'un work
   */
  public function editForm(Work $work)
  {
    return view('worksAdmin._worksAdmin_editForm', compact('work'));
  }

  /**
   * update d'un work
   */
  public function update(Request $request, Work $work)
  {
    $request->validate([
      'title' => 'required',
      'content' => 'required',
      'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'inSlider' => 'required',
      'client_id' => 'required'
    ]);

    if ($request->hasFile('image')) :
      $imageName = time() . '.' . $request->image->extension();
      $request->image->storeAs('works/images', $imageName);
      $request->image->move(public_path('assets/img/portfolio'), $imageName);
      $work->update($request->only(['title', 'client_id', 'content', 'inSlider',]) + ['image' => $imageName]);

    else :
      $work->update($request->only(['title', 'client_id', 'content', 'inSlider',]));
    endif;

    $work->tags()->sync($request->tags);
    return redirect()->route('worksAdmin.index');
  }

  /**
   * delete d'un work
   */
  public function destroy(Work $work){
    $work->tags()->detach();
    $work->delete();
    return redirect()->route('worksAdmin.index');
}
}
