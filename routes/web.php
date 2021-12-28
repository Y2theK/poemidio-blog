<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/articles', function () {
//     return "article lists";
// });
// //Naming Route Name and calling
// Route::get('articles/detail/{id}', function ($id) {
//     return "Article Detail - $id";
// })->name('articles.detail');
// Route::get('articles/more/{id}', function ($id) {
//     return redirect()->route('articles.detail', $id);
// });

Route::get('/', [ArticleController::class,'home'])->name('articles.home');
Route::get('/home', [App\Http\Controllers\ArticleController::class, 'home'])->name('home')->name('articles.home');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/detail/{article}', [ArticleController::class, 'detail'])->name('articles.detail');
Route::get('/articles/add', [ArticleController::class,'add'])->name('articles.add')->name('articles.add');
Route::post('/articles/create', [ArticleController::class,'create'])->name('articles.create');
Route::get('/articles/edit/{article}', [ArticleController::class,'edit'])->name('articles.edit');
Route::post('/articles/edit/{article}', [ArticleController::class,'update'])->name('articles.update');
Route::get('/articles/delete/{article}', [ArticleController::class,'delete'])->name('articles.delete');

Route::post('/comments/create', [CommentController::class,'create'])->name('comments.create');
Route::get('/comments/delete/{article}', [CommentController::class,'delete'])->name('comments.delete');

Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
Route::post('/categories/create', [CategoryController::class,'create'])->name('categories.create');
Route::get('/categories/delete/{category}', [CategoryController::class,'delete'])->name('categories.delete');

Auth::routes();
