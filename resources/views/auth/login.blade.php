@extends('layouts.app')
@section('title')
    Login
@endsection
@section ('styles')
    <style>
        .column {
            max-width: 450px;
        }

        .grid {
            height: 100%;
        }

        body {
            background-color: #DADADA;
        }
    </style>
@endsection
@section('content')
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui header teal">
                <div class="content">Login to your account</div>
            </h2>

            <form class="ui form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="ui stacked segment">
                    <div class="field ui left labeled fluid input {{ $errors->has('email') ? ' error' : '' }}">
                        <div class="ui label">
                            <i class="icon mail"></i>
                        </div>

                        <input id="email" placeholder="Email" type="email" name="email"
                               value="{{ old('email') }}"
                               required autofocus>

                    </div>
                    @if ($errors->has('email'))
                        <div class="ui error visible message">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                    <div class="field ui left labeled fluid input {{ $errors->has('password') ? ' error' : '' }}">
                        <div class="ui label">
                            <i class="icon lock"></i>
                        </div>
                        <input id="password" placeholder="Password" type="password" name="password" required>


                    </div>
                    @if ($errors->has('password'))
                        <div class="ui error visible message">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                    <div class="field">
                        <div class="ui checkbox">
                            <input tabindex="0" class="hidden" type="checkbox"
                                   name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label>Remember Me</label>
                        </div>
                    </div>
                    <div class="ui fluid buttons">
                        <a class="ui button" href="{{ @route('register') }}">Register</a>
                        <div class="or"></div>
                        <button class="ui teal button" type="submit">Login</button>
                    </div>
                    {{--<button class="ui fluid large teal submit button" type="submit">Login</button>--}}

                </div>
            </form>
            <div class="ui message">
                <a href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            </div>

        </div>
    </div>
    <script>
        $('.ui.checkbox').checkbox();
    </script>
@endsection
