@extends('layouts.app')

@section('content')

@if(Session::has('message_create'))
    <div class="alert bg-success" role="alert">
        <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> 
        {{ Session::get('message_create') }}
    </div>
@endif 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('publications.store') }}" method="POST">
                @csrf
            
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{__('publications.title')}}</strong>
                            <input type="text" name="title" class="form-control" class="@error('title') is-invalid @enderror" value="{{old('title')}}" placeholder="{{__('publications.title_example')}}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{__('publications.content')}}</strong>
                            <textarea class="form-control" style="height:250px" class="@error('content') is-invalid @enderror" name="content" placeholder="{{__('publications.content')}}">{{old('content')}}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">{{ __('publications.button_create_save') }}</button>
                    </div>
                </div>
            
            </form>
                   
        </div>
    </div>
</div>
@endsection
