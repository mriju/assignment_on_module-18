<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{id}/category', [PostController::class, 'countCategoryById'])->name('posts.countCategoryById');
Route::delete('posts/{id}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');

Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/{id}/posts', [CategoryController::class, 'getCategoryById'])->name('categories.getCategoryById');
Route::get('categories/{id}/latest-posts', [CategoryController::class, 'latestPostByCategoryId'])->name('categories.latestPostByCategoryId');
Route::get('categories/latest-posts', [CategoryController::class, 'latestPostByCategory'])->name('categories.latestPostByCategory');
