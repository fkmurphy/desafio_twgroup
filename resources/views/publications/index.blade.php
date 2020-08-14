@extends('layouts.app')
@include('publications.publication.index')

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
            <small>{{ __('publications.no_publications') }}Aún no hay publicaciones.</small> 
        @endif
        @yield('publications')
        
       
        </div>
    </div>
</div>
@endsection
