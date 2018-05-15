@extends('layouts.app')
@section('title')
    Register
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
                <div class="content">Create a new account</div>
            </h2>

            <form class="ui form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="ui stacked segment">
                    <div class="field ui left labeled fluid input {{ $errors->has('name') ? 'error' : '' }}">
                        <div class="ui label">
                            <i class="icon user"></i>
                        </div>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Name" required
                               autofocus>

                        @if ($errors->has('name'))
                            <div class="ui error visible message">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="field ui left labeled fluid input {{ $errors->has('email') ? 'error' : '' }}">
                        <div class="ui label">
                            <i class="icon mail"></i>
                        </div>

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               placeholder="Email Address"
                               required>

                        @if ($errors->has('email'))
                            <div class="ui error message visible">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="field ui left labeled fluid input {{ $errors->has('password') ? 'error' : '' }}">
                        <div class="ui label">
                            <i class="icon lock"></i>
                        </div>

                        <input id="password" type="password" class="form-control" name="password"
                               placeholder="Password" required>

                        @if ($errors->has('password'))
                            <div class="ui error message visible">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="field ui left labeled fluid input">
                        <div class="ui label">
                            <i class="icon lock"></i>
                        </div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               placeholder="Confirm Password"
                               required>

                    </div>
                    <button class="ui fluid large teal submit button" type="submit">Register</button>
                </div>


            </form>
            <div class="ui message">
                Already have an account?
                <a href="{{ route('login') }}">
                    Log in
                </a>
            </div>
        </div>
    </div>

@endsection
