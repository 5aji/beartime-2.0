<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/semantic.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
<div id="app">
    <div class="pusher">

        <div class="ui top huge inverted attached pointing menu">
            <div class="ui container">
                <a class="item" href="{{ @route('user.home') }}">
                    Home
                </a>
                <a class="item">
                    Download
                </a>
                @guest
                    <div class="right menu">
                        <a class="item button inverted" href="{{ @route('login') }}">Login</a>
                        <a class="item button inverted" href="{{ @route('register') }}">Register</a>
                    </div>
                @endguest
                @auth
                    <div class="right menu">
                        <div class="ui pointing above item dropdown">
                            {{ Auth::user()->name }}
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <a class="item" href="{{ @route('user.options') }}">
                                    Options
                                </a>
                                @if(Auth::user()->hasRoles(['admin']))
                                    <a class="item" href="{{ route('admin.index') }}">
                                        Admin Console
                                    </a>
                                @endif
                                @if(Auth::user()->hasRoles(['moderator']))
                                    {{--FIXME: route to proper place--}}
                                    <a class="item" href="{{ route('admin.index') }}">
                                        Moderator Console
                                    </a>
                                @endif
                                <a class="item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>


                @endauth
            </div>

        </div>

        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/semantic.js') }}"></script>
<script src="{{ asset('js/laroute.js') }}"></script>
<script>
    $('.ui.dropdown')
        .dropdown({transition: 'drop', on: 'hover'})
    ;
</script>
</body>
</html>
