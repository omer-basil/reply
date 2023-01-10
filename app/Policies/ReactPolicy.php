<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReactPolicy
{
    use HandlesAuthorization;

    public function create(User $user, Post $post)
    {
        return $user->id == auth()->id();
    }
}
