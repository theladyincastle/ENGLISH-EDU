<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/parts-of-speech', function () {
    return view('layouts.parts-of-speech');
})->name('parts');

Route::get('/sentence-structure', function () {
    return view('sentence-structure');
})->name('sentence');
Route::get('/clauses', function () {
    return view('2.clauses');
})->name('clauses');
Route::get('/phrases', function () {
    return view('2.phrases');
})->name('phrases');

