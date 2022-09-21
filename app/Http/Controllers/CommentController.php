<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        //
    }

    public function create() {
        //
    }

    public function store(StoreCommentRequest $request) {
        //
    }

    public function storeWithPost(StoreCommentRequest $request, Post $post) {
        $comment = Comment::create([
            'text' => $request->input('text'),
            'post_id' => $post->id,
            'user_id' => Auth::user()->id,
            'parent_id' => null
        ]);

        $notification = new Notification([
            'action' => 'Published',
            'user_id' => Auth::user()->id
        ]);

        $comment->notifications()->save($notification);

        return redirect(route('posts.show', compact('post')) . '#comment-form');
    }

    public function storeReply(StoreCommentRequest $request, Comment $comment) {

        Comment::create([
            'text' => $request->input('text'),
            'user_id' => Auth::user()->id,
            'post_id' => $comment->post_id,
            'parent_id' => $comment->id
        ]);

        $post = $comment->post;
        
        return redirect(route('posts.show', compact('post')) . '#comment-form');
    }

    public function createReply(Comment $comment) {
        return view('comments.reply', compact('comment'));
    }

    public function show(Comment $comment) {
        //
    }

    public function edit(Comment $comment) {
        return view('comments.edit', compact('comment'));
    }

    public function update(StoreCommentRequest $request, Comment $comment) {
        $comment->update([
            'text' => $request->input('text')
        ]);

        $post = $comment->post;

        return redirect(route('posts.show', compact('post')) . '#comment-form');
    }

    public function destroy(Comment $comment) {
        $post = $comment->post;

        $comment->notifications()->update([
            'action' => 'Deleted',
            'notifiable_id' => null
        ]);
        
        $comment->delete();

        return redirect(route('posts.show', compact('post')) . '#comment-form');
    }
}
