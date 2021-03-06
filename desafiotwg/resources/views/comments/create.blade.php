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
            <div class="publication-in-comment">
                @include('comments.publication')
            </div>
            
            <form action="{{ route('comments.store',$publication->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('comments.field_content') }}</strong>
                            <textarea class="form-control" style="height:250px" class="@error('content') is-invalid @enderror" name="content" placeholder="{{ __('comments.placeholder_field_content') }}">{{old('content')}}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">{{ __('comments.button_send_comment') }}</button>
                    </div>
                </div>
            
            </form>
                   
        </div>
    </div>
</div>
@endsection
