<?php

namespace App\Observers;

use App\{Comment,User,Publication};
use App\Notifications\CreateCommentNotification;

class CommentObserver
{
    /**
     * Handle the comment "created" event.
     *
     * @param  \App\Comment  $comment
     * @return void
     */
    public function created(Comment $comment,Publication $publication)
    {
        $publication = Publication::find($comment->publication_id);
        if($publication && $user = User::find($publication->user_id)){
            $user->notify(new CreateCommentNotification($comment));
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
