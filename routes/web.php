<?php

use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
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

Route::model('user', User::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function() { return view('dashboard'); })->middleware('auth')->name('dashboard');
Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);
Route::resource('comments', CommentController::class);

Route::get('/user/{user}/posts', [PostController::class, 'getUserPosts'])->name('getUserPosts');

require __DIR__.'/auth.php';
