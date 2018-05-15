@extends('layouts.app')

@section('crumb')
    admin
@endsection


@section('content')
    @include('layouts.navbar')
    <div class="ui middle aligned center aligned grid very padded">
        <div class="eight wide column">
            @include('admin.users-module')
            @include('admin.roles-module')
            @include('admin.schedules-module')
        </div>

    </div>
@endsection
