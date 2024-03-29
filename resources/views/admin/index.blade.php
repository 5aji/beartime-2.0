@extends('layouts.app')

@section('crumb')
    admin
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        @include('admin.users-module')
                        @include('admin.roles-module')
                        @include('admin.schedules-module')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
