<template>
    <div class="ui thin left inverted vertical menu sidebar" id="sidebar" style="overflow: visible !important;">
        <a class="item">
            Home
        </a>
        <a class="item">
            Download
        </a>
        @guest
        <div class="menu">
            <a class="item button inverted" href="{{ @route('login') }}">Login</a>
            <a class="item button inverted" href="{{ @route('register') }}">Register</a>
        </div>
        @endguest
        @auth
        <div class="ui dropdown item">
            {{ Auth::user()->name }}
            <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" href="{{ @route('user.options') }}">
                    Options
                </a>
                @if(Auth::user()->hasRoles(['admin']))
                <a class="item" href="{{ route('admin.dashboard') }}">
                    Admin Console
                </a>
                @endif
                @if(Auth::user()->hasRoles(['moderator']))
                {{--FIXME: route to proper place--}}
                <a class="item" href="{{ route('admin.dashboard') }}">
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
        @endauth
    </div>
    <div class="ui right inverted vertical sidebar" id="announcements">
        <div class="ui cards container">
            <div class="card">
                <div class="content">
                    <div class="header">Elliot Fu</div>
                    <div class="meta">Friend</div>
                    <div class="description">
                        Elliot Fu is a film-maker from New York.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pusher" id="app">
        <div class="ui top huge inverted attached pointing menu">
            {{--Here we have the sidebar/lunchbar popups on left/right side--}}
            <a class="item" id="sidebar-button">
                <i class="sidebar icon"></i>
            </a>
            {{-- TODO: add title--}}
            <div class="right menu">
                <a class="item" id="announcements-button">
                    <i class="announcement icon"></i>
                </a>
            </div>
        </div>
        <div class="ui container">

        </div>

    </div>
</template>
<script>
    $(document).ready(function () {
        $('#sidebar').sidebar({transition: 'scale down'}).sidebar('attach events', '#sidebar-button')
        $('#announcements').sidebar({transition: 'push'}).sidebar('attach events', '#announcements-button')
        $('.ui.dropdown').dropdown({transition: 'drop', on: 'hover'})
    });
</script>
<style>

</style>