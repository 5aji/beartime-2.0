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
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Schedules
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Classes</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($schedules as  $schedule)
                                        <tr>
                                            <th>{{ $schedule->name }}</th>
                                            <th>{{ $schedule->date }}</th>
                                            <th><a class="btn btn-primary btn-sm"
                                                   href="{{@route('schedules.show', $schedule->id)}}">Details</a></th>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer right">
                                <a class="btn btn-primary right"
                                   href="{{@route('schedules.create')}}">New Schedule</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection