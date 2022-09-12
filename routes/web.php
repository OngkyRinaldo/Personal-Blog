<?php

use App\Http\Controllers\cms\CategoryController;
use App\Http\Controllers\cms\PostController;
use App\Http\Controllers\cms\TagController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;

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



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('index');

    Route::resources([
        'category' => CategoryController::class,
        'post' => PostController::class,
        'tag' => TagController::class,
    ]);
    Route::get('/admin', [HomeController::class, 'admin'])->name('admin')->middleware('checkRole:admin');
    Route::get('/admin/post', [HomeController::class, 'post'])->name('admin.post')->middleware('checkRole:admin');
    Route::get('/admin/user', [HomeController::class, 'user'])->name('admin.user')->middleware('checkRole:admin');
});

Route::controller(PageController::class)->group(function () {
    Route::get('', 'index')->name('guest.index');
    Route::get('posts/{post}', 'post')->name('guest.post');
    Route::get('categories', 'categories')->name('guest.categories');
    Route::get('categories/{category}', 'category')->name('guest.category');
    Route::get('tags/{tag}', 'tag')->name('guest.tag');
    Route::get('authors/{user}', 'author')->name('guest.author');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
