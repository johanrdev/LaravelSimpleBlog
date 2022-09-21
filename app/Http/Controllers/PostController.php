<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller {
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
        $this->authorizeResource(Post::class);
    }

    // Show all posts
    public function index() {
        if (!empty(request('user'))) {
            $posts = Post::whereHas('user', function($query) {
                $query->where('name', 'LIKE', request('user'));
            })->orderBy('id', 'desc')->paginate(10);
        } else if (!empty(request('category'))) {
            $posts = Post::whereHas('categories', function($query) {
                $query->where('name', 'LIKE', request('category'));
            })->orderBy('id', 'desc')->paginate(10);
        } else {
            $posts = Post::orderBy('id', 'desc')->paginate(10);
        }

        return view('posts.index', compact('posts'));
    }

    // Show all user posts
    public function getUserBlog(Request $request, User $user) {
        $user = User::find($user->id);
        $posts = Post::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(10);

        return view('posts.index', compact('user', 'posts'));
    }

    // Show the form to create a new post
    public function create() {
        return view('posts.create');
    }

    // Insert a new post
    public function store(StorePostRequest $request) {
        $post = Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => Auth::user()->id
        ]);

        $post->categories()->attach($request->categories);

        $notification = new Notification([
            'action' => 'Published',
            'user_id' => Auth::user()->id
        ]);

        $post->notifications()->save($notification);

        return redirect()->route('posts.index', Auth::user());
    }

    // Show a single post
    public function show(Post $post) {
        $comments = Comment::where('post_id', $post->id)
            ->whereNull('parent_id')
            ->orderBy('id', 'desc')
        ->paginate(10);

        return view('posts.show', compact('post', 'comments'));
    }

    // Show the form for updating a post
    public function edit(Post $post) {
        return view('posts.edit', compact('post'));
    }

    // Update a post
    public function update(StorePostRequest $request, Post $post)
    {
        $post->update([
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]);

        $notification = new Notification([
            'action' => 'Updated',
            'user_id' => Auth::user()->id
        ]);

        $post->notifications()->save($notification);

        $post->categories()->sync($request->input('categories'));

        return redirect()->route('posts.show', $post);
    }

    // Delete a post
    public function destroy(Post $post)
    {
        // Set the notifiable_id for all feed notifications associated to the post's comments' to null.
        // This will display "The item was deleted" in the feed.
        $post->comments->map(function($comment) {
            return $comment->notifications()->update([
                'action' => 'Deleted',
                'notifiable_id' => null
            ]);
        });
        
        $post->delete();

        $post->notifications()->update([
            'action' => 'Deleted',
            'notifiable_id' => null
        ]);

        return redirect()->route('dashboard.index', Auth::user())->with('message', 'The post was successfully deleted!');
    }
}
