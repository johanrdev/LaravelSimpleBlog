<?php

use App\Models\User;
use App\Models\Post;
use App\Models\Notification;
use App\Http\Controllers\UserController;
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

// Route::model('user', User::class);

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('posts.index', Auth::user());
    } else {
        return redirect()->route('login');
    }
});

Route::get('/feed', function() {
    $notifications = Notification::whereIn('user_id', Auth::user()->followings
        ->map(function($user) { 
            return $user->id; 
        }))
        ->orWhere('user_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('feed', compact('notifications')); 
})->middleware('auth')->name('feed');

Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);
Route::resource('comments', CommentController::class);
Route::resource('users', UserController::class);

// Route::get('/posts', [PostController::class, 'index'])->name('browse');
// Route::get('/users/{user}/blog', [PostController::class, 'getUserBlog'])->name('getUserBlog');

Route::post('/comments/create/{post}', [CommentController::class, 'storeWithPost'])->name('comments.storeWithPost');
Route::get('/comments/reply/{comment}', [CommentController::class, 'createReply'])->name('comments.createReply');
Route::post('/comments/reply/{comment}', [CommentController::class, 'storeReply'])->name('comments.storeReply');
// Route::post('/comments/reply/{comment}', [CommentController::class, 'reply'])->name('reply');

Route::post('/search', [SearchController::class, 'filter'])->name('search');

Route::post('follow/{user}', [UserController::class, 'follow'])->name('follow');
Route::post('unfollow/{user}', [UserController::class, 'unfollow'])->name('unfollow');

require __DIR__.'/auth.php';
