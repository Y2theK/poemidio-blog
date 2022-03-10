<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;

//admin routes
Route::group(['middleware'=>'role:Admin|Super-Admin', 'auth'], function () {
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/articles', ArticleController::class);
    Route::resource('/categories', CategoryController::class);
});
