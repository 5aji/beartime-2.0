@extends('layouts.app')
@section ('styles')
    <style>
        .column {
            max-width: 450px;
        }
        .grid {
            height: 100%;
        }
        .pusher {
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
                    <div class="field {{ $errors->has('email') ? ' error' : '' }}">

                        <input id="email" placeholder="Email" type="email" class="form-control" name="email"
                               value="{{ old('email') }}"
                               required autofocus>

                        @if ($errors->has('email'))
                            <div class="ui error visible message">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="field {{ $errors->has('password') ? ' error' : '' }}">

                        <input id="password" placeholder="Password" type="password" name="password" required>

                        @if ($errors->has('password'))
                            <div class="ui error visible message">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <input tabindex="0" class="hidden" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label>Remember Me</label>
                        </div>
                    </div>
                    <button class="ui fluid large teal submit button" type="submit">Login</button>

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
