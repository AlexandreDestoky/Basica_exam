<?php

use Illuminate\Support\Facades\Route;


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

//-----------------------------Route Par défaut -------------------------------------------

//Route par défaut
Route::get('/', function () {
  return view('home.index');
})->name("home");

//-----------------------------Route de la page contact----------------------------------------

require __DIR__ . '/contact.php';

//-----------------------------Route des posts ----------------------------------------

require __DIR__ . '/posts.php';

//-----------------------------Route des works---------------------------------------------

require __DIR__ . '/works.php';

//-------------------------------PostsAdmin-----------------------------------------

require __DIR__ . '/postsAdmin.php';

//-------------------------------WorksAdmin-----------------------------------------

require __DIR__ . '/worksAdmin.php';

//---------------------------------Login------------------------------------------------

//Back Office DashBoard
Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
