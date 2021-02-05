<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Works;

//------------------------Route des works---------------------------------------------

// LISTE DES WORKS
// PATTERN: /works
// CTRL: Works
// ACTION: index
Route::get('/works', [Works::class, 'index'])->name('portfolio');


// DETAIL D'UN WORK
// PATTERN: /works/work/slug
// CTRL: Works
// ACTION: show
Route::get('/works/{work}/{slug}', [Works::class, 'show'])
  ->where('work', '[1-9][0-9]*')
  ->where('slug', '[a-z0-9][a-z0-9\-]*')
  ->name('portfolio.show');


// AJAX MORE WORKS
// PATTERN: /works/ajax/more
// CTRL: Works
// ACTION: more
Route::get('/works/ajax/more/', [Works::class, 'more'])->name('portfolio.ajax.more');