@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h3>{{ __('publications.greeting_title') }}</h3>
        @foreach($publications as $pub)
        <div class="card-header d-flex justify-content-between">
            <small class="created-by">
                {{ __('publications.created_by') }}: <span>{{$pub->user}}</span>
            </small>
        </div>
            <div class="card text-center">
                @can('create',[App\Comment::class,$pub->id])
                    <?php $canComment=true ?>
                @else 
                    <?php $canComment=false ?>
                @endcan
                @include('publications.publication.body')
                @if (isset($pub->comments_count))
                    @include('publications.publication.comments')
                @endif
                <a href="#" class="btn btn-primary">{{ __('publications.show_publication') }}</a>

            </div>
            <hr>
        @endforeach
        
        </div>
    </div>
</div>
@endsection
