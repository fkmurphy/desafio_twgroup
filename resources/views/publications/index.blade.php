@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @foreach($publications as $pub)
            <h1>Publicaciones</h1>
            <h3>{{ $pub->title }}</h3>
            <p>{{ $pub->content }}</p>
            @foreach($pub->comments as $comment)
                <h4>Comentario</h4>
                <p>{{$comment->content}}</p>
            @endforeach
            <hr>
        @endforeach
        </div>
    </div>
</div>
@endsection
