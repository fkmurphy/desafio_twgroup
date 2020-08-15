<div class="card-footer text-muted">
    <p>
        <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#comments{{$pub->id}}" role="button" aria-expanded="false" aria-controls="comments{{$pub->id}}">
            {{ __('publications.button_show_comments') }} <span class="badge badge-light">{{$pub->comments_count}}</span>
        </a>
    </p>
    <div class="collapse" id="comments{{$pub->id}}">
        <div class="card card-body">
        @foreach($pub->comments as $comment)
            <div class="card comment-card" >
                <div class="card-header d-flex  comment-header ">
                    <p class="name-user-comment">{{$comment->user->name}}</p>
                    <p class="ml-auto date-comment">{{$comment->created_at}}</p>
                </div>
                <div class="card-body">
                    <p class="card-text">{{$comment->content}}</p>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>