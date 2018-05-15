@extends('layouts.app')

@section('crumb')
    schedules
@endsection


@section('content')
    <div class="ui segments">
        <div class="ui segment">
            <h1 class="header">Schedules</h1>
        </div>
        <div class="ui segment">
            <div class="panel-body">
                <table class="ui celled table">
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
                            <td>{{ $schedule->name }}</td>
                            <td>{{ $schedule->date }}</td>
                            <td><a class="btn btn-primary btn-sm"
                                   href="{{@route('schedules.show', $schedule->id)}}">Details</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="ui segment">
                <a class="ui primary button"
                   href="{{@route('schedules.create')}}">New Schedule</a>
            </div>
        </div>
    @endsection