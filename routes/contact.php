<?php

use Illuminate\Support\Facades\Route;

//-----------------------------Route de la page contact----------------------------------------

// ROUTE DE LA PAGE CONTACT
// PATTERN: /contact
Route::get('/contact', function () {
  return view('contact.index');
})->name("contact");
