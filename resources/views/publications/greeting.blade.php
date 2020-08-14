@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @foreach($publications as $pub)
            <h1>Publicaciones</h1>
            <h3>{{ $pub->title }}</h3>
            <p>{{ $pub->content }}</p>
          
            <hr>
        @endforeach
        </div>
    </div>
</div>
@endsection
