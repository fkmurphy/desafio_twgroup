<?php

namespace App\Observers;

use App\{Comment};
use App\Notifications\NewCommentNotification;

class CommentObserver
{
    /**
     * Handle the comment "created" event.
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

    /**
     * Handle the comment "updated" event.
     *
     * @param  \App\Comment  $comment
     * @return void
     */
    public function updated(Comment $comment)
    {
        //
    }

    
}
