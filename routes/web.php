<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureNewsCreator;

Auth::routes();

Route::get('/welcome', function () {
    return view('welcome');
});

// show news by specific tag
Route::get('/', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');

Route::get('/news/create', [App\Http\Controllers\NewsController::class, 'create'])->name('news.create')->middleware('auth');
Route::post('/', [App\Http\Controllers\NewsController::class, 'store'])->name('news.store');

Route::get('/news/{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

Route::get('/news/{news}/edit', [App\Http\Controllers\NewsController::class, 'edit'])->name('news.edit');
Route::patch('/news/{news}', [App\Http\Controllers\NewsController::class, 'update'])->name('news.update');
Route::delete('news/{news}', [App\Http\Controllers\NewsController::class, 'destroy'])->name('news.destroy');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
