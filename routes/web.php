<?php

use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
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
    if (Auth::check()) {
        return redirect()->route('getUserBlog', Auth::user());
    } else {
        return redirect()->route('login');
    }
});

Route::get('/dashboard', function() { return view('dashboard'); })->middleware('auth')->name('dashboard');
Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);
Route::resource('comments', CommentController::class);

Route::get('/posts', [PostController::class, 'index'])->name('browse');
Route::get('/users/{user}/blog', [PostController::class, 'getUserBlog'])->name('getUserBlog');

Route::post('/search', [SearchController::class, 'filter'])->name('search');

require __DIR__.'/auth.php';
