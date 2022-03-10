<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\GithubController;
use App\Http\Controllers\Auth\FacebookController;

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


Auth::routes();
//facebook oauth
Route::get('/auth/facebook/redirect', [FacebookController::class,'handleFacebookRedirect'])->name('auth.facebook.redirect');
Route::get('/auth/facebook/callback', [FacebookController::class,'handleFacebookCallback'])->name('auth.facebook.callback');

//GITHUB oauth
Route::get('/auth/github/redirect', [GithubController::class,'handleGithubRedirect'])->name('auth.github.redirect');
Route::get('/auth/github/callback', [GithubController::class,'handleGithubCallback'])->name('auth.github.callback');
//visitor routes
Route::view('/', 'home');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/detail/{article}', [ArticleController::class, 'detail'])->name('articles.detail');

//user routes
Route::middleware(['auth','verified'])->group(function () {
    Route::prefix('articles/')->as('articles.')->group(function () {
        Route::get('add', [ArticleController::class,'add'])->name('add');
        Route::post('create', [ArticleController::class,'create'])->name('create');
        Route::get('edit/{article}', [ArticleController::class,'edit'])->name('edit');
        Route::post('edit/{article}', [ArticleController::class,'update'])->name('update');
        Route::get('delete/{article}', [ArticleController::class,'delete'])->name('delete');
    });
    Route::prefix('comments/')->as('comments.')->group(function () {
        Route::post('create', [CommentController::class,'create'])->name('create');
        Route::get('delete/{article}', [CommentController::class,'delete'])->name('delete');
    });
    Route::prefix('categories/')->as('categories.')->group(function () {
        Route::get('/', [CategoryController::class,'index'])->name('index');
        Route::post('create', [CategoryController::class,'create'])->name('create');
        Route::get('delete/{category}', [CategoryController::class,'delete'])->name('delete');
    });
    Route::prefix('profile/')->as('profile.')->group(function () {
        Route::get('/{user}', [ProfileController::class,'index'])->name('index');
        Route::get('/{user}/notifications', [ProfileController::class,'getCommentNotifications'])->name('notification');
        Route::get('/{user}/notifications/{id}', [ProfileController::class,'markAsRead'])->name('notification.markAsRead');
    });
});

//admin routes in routes/admin.php
