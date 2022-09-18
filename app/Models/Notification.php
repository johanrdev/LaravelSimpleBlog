<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['action', 'user_id', 'notifiable_type', 'notifiable_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function notifiable() {
        return $this->morphTo(__FUNCTION__, 'notifiable_type', 'notifiable_id');
    }
}
