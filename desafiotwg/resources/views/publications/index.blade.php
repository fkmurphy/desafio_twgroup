@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
        <div class="d-flex ">
            <div  class="p-2">
                <h1>{{ __('publications.index_title') }}</h1>
            </div>
            <div class="ml-auto p-2">
                <a href="{{route('publications.create')}}" class="btn btn-success btn-sm ">{{ __('publications.button_create_publication') }}</a>        
            </div>
        </div>
        @if($publications->count() == 0) 
            <small>{{ __('publications.no_publications') }}.</small> 
        @endif
        
        @foreach($publications as $pub)

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
            <hr>
        @endforeach
        
        {!! $publications->links() !!}
        </div>
    </div>
</div>

@endsection
