<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorksAdmin;

//----------------------------WorksAdmin-----------------------------------------

// LISTE DES works
// PATTERN: /admin/works
// CTRL: worksAdmin
// ACTION: index
Route::get('/admin/works', [worksAdmin::class, 'index'])->middleware(['auth'])->name('worksAdmin.index');


// AJOUT D'UN work: FORMULAIRE
// PATTERN: /admin/works/add/form
// CTRL: worksAdmin
// ACTION: create
Route::get('/admin/works/add/form', [worksAdmin::class, 'addForm'])->middleware(['auth'])->name('worksAdmin.addForm');


// AJOUT D'UN work: INSERT
// PATTERN: /admin/works/add/insert
// CTRL: worksAdmin
// ACTION: store
Route::post('/admin/works/add/insert', [worksAdmin::class, 'insert'])->middleware(['auth'])->name('worksAdmin.insert');


// EDITION D'UN POST: FORMULAIRE
// PATTERN: /admin/posts/edit/form/x
// CTRL: AdminPosts
// ACTION: edit
Route::get('/admin/works/edit/form/{work}', [WorksAdmin::class, 'editForm'])->middleware(['auth'])->name('worksAdmin.editForm');


// EDITION D'UN POST: UPDATE
// PATTERN: /admin/posts/edit/x
// CTRL: AdminPosts
// ACTION: edit
Route::put('/admin/works/edit/{work}', [WorksAdmin::class, 'update'])->middleware(['auth'])->name('worksAdmin.update');

// SUPPRESSION D'UN POST
// PATTERN: /admin/posts/delete/x
// CTRL: AdminPosts
// ACTION: destroy
Route::delete('/admin/works/delete/{work}', [WorksAdmin::class, 'destroy'])->middleware(['auth'])->name('worksAdmin.destroy');