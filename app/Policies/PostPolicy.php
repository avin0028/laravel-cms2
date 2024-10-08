<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(['writer', 'admin']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->author_id || $user->role = 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->author_id || $user->role = 'admin';

    }
    public function view(User $user, Post $post)
    {
        return $user->id === $post->author_id || $user->role = 'admin';
    }


}
