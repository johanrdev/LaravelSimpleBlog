<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    use HasFactory;
    
    protected $fillable = ['text', 'user_id', 'post_id', 'parent_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function notifications() {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    public function replies() {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
