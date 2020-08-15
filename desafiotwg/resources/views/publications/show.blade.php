@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card text-center">
                @can('create',[App\Comment::class,$pub->id])
                    <?php $canComment=true ?>
                @else 
                    <?php $canComment=false ?>
                @endcan
                @include('publications.publication.header_with_options')
                @include('publications.publication.body')
                @if (isset($pub->comments_count))
                    @include('publications.publication.comments')
                @endif
        
            </div>
        </div>
    </div>
</div>
@endsection
       