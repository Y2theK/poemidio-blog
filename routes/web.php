<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ArticleController::class,'home']);
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/detail/{id}', [ArticleController::class, 'detail']);
Route::get('/articles/delete/{id}', [ArticleController::class,'delete']);
Route::get('/articles/add', [ArticleController::class,'add']);
Route::post('/articles/create', [ArticleController::class,'create'])->name('articles.create');
Route::get('/articles/edit/{id}', [ArticleController::class,'edit']);
Route::post('/articles/edit/{id}', [ArticleController::class,'update']);
Route::post('/comments/add', [CommentController::class,'create']);
Route::get('/comments/delete/{id}', [CommentController::class,'delete']);
Route::get('/categories/add', [CategoryController::class,'add']);
Route::post('/categories/create', [CategoryController::class,'create'])->name('categories.create');
Auth::routes();

Route::get('/home', [App\Http\Controllers\ArticleController::class, 'home'])->name('home');
