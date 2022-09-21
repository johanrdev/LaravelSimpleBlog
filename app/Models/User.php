<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'blog_name',
        'description',
        'email',
        'password',
        'blog_name',
        'description'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function categories() {
        return $this->hasMany(Category::class)->orderBy('name', 'asc');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function followings() {
        return $this->belongsToMany(User::class, 'friend_user', 'user_id', 'friend_id')->withTimestamps();
    }

    public function followers() {
        return $this->belongsToMany(User::class, 'friend_user', 'friend_id', 'user_id')->withTimestamps();
    }
}
