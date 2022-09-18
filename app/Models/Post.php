<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class)->orderBy('id', 'desc');
    }

    public function notifications() {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    // public function getRouteKeyName() {
    //     return 'title';
    // }
}
