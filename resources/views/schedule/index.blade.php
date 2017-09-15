@extends('layouts.app')

@section('crumb')
    schedules
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        @include('admin.schedules-module')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection