<?php

namespace App\Policies;

use App\Comment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
define('MAX_COMMENTS_PER_USER',1);
class CommentPolicy
{
    use HandlesAuthorization;

    
    /**
     * Determine whether the user can create comments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user,int $publication)
    {
        return Comment::where('publication_id','=',$publication)
            ->where('user_id','=',$user->id)->count() >= MAX_COMMENTS_PER_USER ? false : true;
    }

}
