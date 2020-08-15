<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/publications') }}">{{ __('navbar.Publications') }}</a>
                    @else
                        <a href="{{ route('login') }}">{{ __('navbar.Login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ __('navbar.Register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    The Wow Group
                </div>
                <div class="subtitle">
                    <small> {{ __('home.subtitle') }} </small>
                <div>
                <div class="links">
                    <a href="https://github.com/fkmurphy">Julian Murphy</a>
                </div>
            </div>
        </div>
    </body>
</html>
