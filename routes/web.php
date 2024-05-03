<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\NewsController::class, 'index'])->name('article.index');
Route::get('/create', [App\Http\Controllers\NewsController::class, 'create'])->name('article.create')->middleware('auth');
Route::post('/', [App\Http\Controllers\NewsController::class, 'store'])->name('article.store');
Route::get('/news/{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('article.show');
// edit, delete
// soft delete

// show news with specific tag

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
