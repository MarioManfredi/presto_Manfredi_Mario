<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// home
Route::get('/', [PublicController::class, 'homepage'])->name('welcome');

// article
Route::get('article/create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');