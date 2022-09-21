<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function __construct() {
        $this->middleware('auth');
        $this->authorizeResource(User::class);
    }

    public function index() {
        $users = User::orderBy('blog_name', 'asc')->paginate(10);

        return view('users.index', compact('users'));
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show(User $user) {
        $posts = $user->posts()->paginate(10);

        return view('users.show', compact('user', 'posts'));
    }

    public function edit(User $user) {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user) {
        $user_to_update = User::find($user->id);

        $password = $user_to_update->password;

        if ($request->filled('new_password')) {
            $request->validate([
                'new_password' => 'min:8'
            ]);

            $password = Hash::make($request->input('new_password'));
        }

        if (Hash::check($request->input('password'), $user_to_update->password)) {
            $user->update([
                'name' => $request->input('name'),
                'blog_name' => $request->input('blog_name'),
                'email' => $request->input('email'),
                'description' => $request->input('description'),
                'password' => $password
            ]);

            return redirect()->route('users.edit', compact('user'))
                ->with('message', 'User was successfully updated!');
        }

        return redirect()->route('users.edit', compact('user'))
            ->withErrors(['error' => 'Incorrect credentials']);
    }

    public function destroy(User $user) {
        //
    }

    public function follow(Request $request, User $user) {
        Auth::user()->followings()->attach($user->id);

        return redirect()->route('users.show', compact('user'));
    }

    public function unfollow(Request $request, User $user) {
        Auth::user()->followings()->detach($user->id);

        return redirect()->route('users.show', compact('user'));
    }
}
