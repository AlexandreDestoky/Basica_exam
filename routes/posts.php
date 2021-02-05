<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts;

//-----------------------------Route des posts ----------------------------------------

// ROUTE DE LA PAGE BLOG LISTE DES POSTS
// PATTERN: /posts
// CTRL: Posts
// ACTION: index
Route::get('/posts', [Posts::class, 'index'])->name('blog');


// ROUTE DETAIL D'UN POST
// PATTERN: /posts/post/slug
// CTRL: Posts
// ACTION: show
Route::get('/posts/{post}/{slug}', [Posts::class, 'show'])
  ->where('post', '[1-9][0-9]*')
  ->where('slug', '[a-z0-9][a-z0-9\-]*')
  ->name('blog.show');
