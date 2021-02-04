<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Posts;
use App\Http\Controllers\Works;
use App\Http\Controllers\PostsAdmin;
use App\Http\Controllers\WorksAdmin;

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

//--------------------------Route Par défaut -------------------------------------------

//Route par défaut
Route::get('/', function () {
  return view('home.index');
})->name("home");


// ROUTE DE LA PAGE CONTACT
// PATTERN: /contact
Route::get('/contact', function () {
  return view('contact.index');
})->name("contact");



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



//----------------------------PostsAdmin-----------------------------------------

// LISTE DES POSTS
// PATTERN: /admin/posts
// CTRL: PostsAdmin
// ACTION: index
Route::get('/admin/posts', [PostsAdmin::class, 'index'])->name('postsAdmin.index');

// AJOUT D'UN POST: FORMULAIRE
// PATTERN: /admin/posts/add/form
// CTRL: PostsAdmin
// ACTION: create
Route::get('/admin/posts/add/form', [PostsAdmin::class, 'addForm'])->name('postsAdmin.addForm');


// AJOUT D'UN POST: INSERT
// PATTERN: /admin/posts/add/insert
// CTRL: PostsAdmin
// ACTION: store
Route::post('/admin/posts/add/insert', [PostsAdmin::class, 'insert'])->name('postsAdmin.insert');


// EDITION D'UN POST: FORMULAIRE
// PATTERN: /admin/posts/edit/form/x
// CTRL: AdminPosts
// ACTION: edit
Route::get('/admin/posts/edit/form/{post}', [PostsAdmin::class, 'editForm'])->name('postsAdmin.editForm');

// EDITION D'UN POST: UPDATE
// PATTERN: /admin/posts/edit/x
// CTRL: AdminPosts
// ACTION: edit
Route::put('/admin/posts/edit/{post}', [PostsAdmin::class, 'update'])->name('postsAdmin.update');


// SUPPRESSION D'UN POST
// PATTERN: /admin/posts/delete/x
// CTRL: AdminPosts
// ACTION: destroy
Route::delete('/admin/posts/delete/{post}', [PostsAdmin::class, 'destroy'])->name('postsAdmin.destroy');

//----------------------------WorksAdmin-----------------------------------------

// LISTE DES works
// PATTERN: /admin/works
// CTRL: worksAdmin
// ACTION: index
Route::get('/admin/works', [worksAdmin::class, 'index'])->name('worksAdmin.index');


// AJOUT D'UN work: FORMULAIRE
// PATTERN: /admin/works/add/form
// CTRL: worksAdmin
// ACTION: create
Route::get('/admin/works/add/form', [worksAdmin::class, 'addForm'])->name('worksAdmin.addForm');


// AJOUT D'UN work: INSERT
// PATTERN: /admin/works/add/insert
// CTRL: worksAdmin
// ACTION: store
Route::post('/admin/works/add/insert', [worksAdmin::class, 'insert'])->name('worksAdmin.insert');



//---------------------BackOffice------------------------------------------------

//Back Office DashBoard
Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
