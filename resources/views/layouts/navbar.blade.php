
<div class="ui top huge inverted attached pointing menu">
    <div class="ui container">
        <a class="item" href="/">
            Home
        </a>
        <a class="item" href="{{ @route('user.dashboard') }}">
            Dashboard
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
            </div>
        @endauth
    </div>

</div>
<script>
    $('.ui.dropdown')
        .dropdown({transition: 'drop', on: 'hover'})
    ;
</script>