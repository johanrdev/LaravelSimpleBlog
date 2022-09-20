<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user) {
        return true;
    }

    public function view(User $user, User $model) {
        return true;
    }

    public function create(User $user) {
        //
    }

    public function update(User $user, User $model) {
        return $user->id === Auth::user()->id || $user->is_admin;
    }

    public function delete(User $user, User $model) {
        return $user->id === Auth::user()->id || $user->is_admin;
    }

    public function restore(User $user, User $model) {
        return $user->is_admin;
    }

    public function forceDelete(User $user, User $model) {
        return $user->id === Auth::user()->id || $user->is_admin;
    }
}
