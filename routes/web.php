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


//Back Office DashBoard
Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
