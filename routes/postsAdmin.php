<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsAdmin;

//----------------------------PostsAdmin-----------------------------------------

// LISTE DES POSTS
// PATTERN: /admin/posts
// CTRL: PostsAdmin
// ACTION: index
Route::get('/admin/posts', [PostsAdmin::class, 'index'])->middleware(['auth'])->name('postsAdmin.index');


// AJOUT D'UN POST: FORMULAIRE
// PATTERN: /admin/posts/add/form
// CTRL: PostsAdmin
// ACTION: create
Route::get('/admin/posts/add/form', [PostsAdmin::class, 'addForm'])->middleware(['auth'])->name('postsAdmin.addForm');


// AJOUT D'UN POST: INSERT
// PATTERN: /admin/posts/add/insert
// CTRL: PostsAdmin
// ACTION: store
Route::post('/admin/posts/add/insert', [PostsAdmin::class, 'insert'])->middleware(['auth'])->name('postsAdmin.insert');


// EDITION D'UN POST: FORMULAIRE
// PATTERN: /admin/posts/edit/form/x
// CTRL: AdminPosts
// ACTION: edit
Route::get('/admin/posts/edit/form/{post}', [PostsAdmin::class, 'editForm'])->middleware(['auth'])->name('postsAdmin.editForm');

// EDITION D'UN POST: UPDATE
// PATTERN: /admin/posts/edit/x
// CTRL: AdminPosts
// ACTION: edit
Route::put('/admin/posts/edit/{post}', [PostsAdmin::class, 'update'])->middleware(['auth'])->name('postsAdmin.update');


// SUPPRESSION D'UN POST
// PATTERN: /admin/posts/delete/x
// CTRL: AdminPosts
// ACTION: destroy
Route::delete('/admin/posts/delete/{post}', [PostsAdmin::class, 'destroy'])->middleware(['auth'])->name('postsAdmin.destroy');