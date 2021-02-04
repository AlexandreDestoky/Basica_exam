<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class WorksAdmin extends Controller
{
    //
    public function index()
    {
      $works = Work::orderBy('created_at', 'DESC')
        ->get();
      return view('worksAdmin.index', compact('works'));
    }

    public function form()
    {
      return view('worksAdmin._worksAdmin_form');
    }

    public function insert(Request $request)
    {
  
        // $request->validate([
        //   'title' => 'required',
        //   'content' => 'required',
        //   'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //   'inSlider' => 'required',
        //   'client_id' => 'required'
        // ]);
  
        if ($request->hasFile('image')) :
          $imageName = time() . '.' . $request->image->extension();
          $request->image->storeAs('works/images', $imageName);
          $request->image->move(public_path('assets/img/portfolio'), $imageName);
  
        else :
          $imageName = '';
        endif;


        // $locations = $request->get('tag');
        // var_dump($request->tag);

  
      Work::create($request->only(['title', 'content', 'inSLider','client_id']) + ['image' => $imageName]);
      return redirect()->route('worksAdmin.index');
    }
}
