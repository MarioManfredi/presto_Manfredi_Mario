<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
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

// revisor index
Route::get('/revisor/index', [RevisorController::class, 'index'])->name('revisor.index')->middleware('isRevisor');

// revisor accepted
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('revisor.accept');

// revisor reject
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('revisor.reject');

// revisor form
Route::get('/revisor/form', [RevisorController::class, 'form'])->name('revisor.form')->middleware('auth');

// revisor request
Route::get('/revisor/request', [RevisorController::class, 'requestRevisor'])->name('requestRevisor')->middleware('auth');

// revisor make
Route::get('/revisor/make/{user}', [RevisorController::class, 'makeRevisor'])->name('makeRevisor');

// revisor cancel
Route::patch('/revisor/cancel', [RevisorController::class, 'cancel'])->name('revisor.cancel');