<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\ArticlesController::class, 'index'])->name('article.index');
