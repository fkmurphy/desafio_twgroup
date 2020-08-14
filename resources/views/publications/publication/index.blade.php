@section('publications')

@foreach($publications as $pub)

        <div class="card text-center">

            <div class="card-header d-flex justify-content-between">
                <small class="created-by">{{ __('publications.created_by') }}: <span>{{$pub->user->name}}</span></small>
                @can('create',[App\Comment::class,$pub->id])
                <a href="{{ url('publications/comment/'.$pub->id) }}">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-left-dots-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                </a>
                    <?php $notPermission=false ?>
                @else 
                    <?php $notPermission=true ?>
                @endcan
            </div>
            <div class="card-body">
                <h5 class="card-title"> {{ $pub->title }}</h5>
                <p class="card-text">{{ $pub->content }}</p>
                @if(isset($notPermission) && $notPermission) 
                    <small>{{ __('publications.already_commented') }}</small> 
                @endif
            </div>
            @if (isset($pub->comments_count))
                @include('publications.publication.comments',['pub' => $pub])
            @endif
        </div>
        <hr>
        @endforeach
    @endsection