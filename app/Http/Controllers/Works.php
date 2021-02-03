<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class Works extends Controller
{
  //
  public function index(int $limit = 6)
  {
    $works = Work::orderBy('created_at', 'DESC')
      ->take($limit)
      ->get();
    return view('portfolio.index', compact('works'));
  }

  public function show(Work $work)
  {
    return view('works._portfolio_works_show', compact('work'));
  }


  public function more(Request $request)
  {
    $limit = (isset($request->limit)) ? $request->limit : 10;

    $works = Work::orderBy('created_at', 'DESC')
      ->take($limit)
      ->offset($request->offset)
      ->get();
    return view('works._portfolio_works_list', compact('works'));
  }
}
