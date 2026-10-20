<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// home
Route::get('/', [PublicController::class, 'homepage'])->name('welcome');

// article
Route::get('article/create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');

//index
Route::get('article/index', [ArticleController::class, 'index'])->name('article.index')->middleware('auth');

//show
Route::get('article/show/{article}', [ArticleController::class, 'show'])->name('article.show')->middleware('auth');

//category
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('byCategory');