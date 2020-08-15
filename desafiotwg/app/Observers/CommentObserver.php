<?php

namespace App\Observers;

use App\{Comment};
use App\Notifications\NewCommentNotification;

class CommentObserver
{
    /**
     * Notify new comment in publication to owner.
     *
     * @param  \App\Comment  $comment
     * @return void
     */
    public function created(Comment $comment)
    {
        $publication = $comment->publication()->first();
        if($publication && $user = $publication->user()->first()){
            $user->notify(new NewCommentNotification($publication));
        }
    }

 
}
