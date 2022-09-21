<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $notifications = Notification::whereIn('user_id', Auth::user()->followings
        ->map(function($user) {  return $user->id; }))
            ->orWhere('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('dashboard.index', compact('notifications'));
    }

    public function posts() {
        $posts = Auth::user()
            ->posts()
            ->orderBy('id', 'desc')
        ->paginate(10);
        
        return view('dashboard.posts', compact('posts'));
    }

    public function categories() {
        return 'categories';
    }

    public function followers() {
        return 'followers';
    }

    public function followings() {
        return 'followings';
    }
}
