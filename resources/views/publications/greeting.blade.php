@extends('layouts.app')
@include('publications.publication.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h3>{{ __('publications.greeting_title') }}</h3>
        @yield('publications')
        
        </div>
    </div>
</div>
@endsection
