<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

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

Route::view('/', 'home');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/detail/{article}', [ArticleController::class, 'detail'])->name('articles.detail');

Route::middleware(['auth'])->group(function () {
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
    });
});

//admin routes
Route::middleware('role:Admin|Super-Admin|Super-User', 'auth')->prefix('admin/')->as('admin.')->group(function () {
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('/roles', RoleController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/articles', AdminArticleController::class);
    Route::resource('/categories', AdminCategoryController::class);
    // Route::get('/roles', [RoleController::class,'index'])->name('roles.index');
});
