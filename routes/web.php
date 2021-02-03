<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts;
use App\Http\Controllers\Works;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/', function () {
//   return view('templates/index');
// });


//Route par défaut
Route::get('/', function () {
  return view('home.index');
})->name("home");


// ROUTE DE LA PAGE CONTACT
// PATTERN: /contact
Route::get('/contact', function () {
  return view('contact.index');
})->name("contact");


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


//Back Office DashBoard
Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
