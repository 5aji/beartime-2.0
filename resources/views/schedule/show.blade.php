@extends('layouts.app')

@section('crumb')
    view schedule
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{ $schedule->name }}
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Number</th>
                                        <th>Name</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($schedule->blocks as  $block)
                                        <tr>
                                            <td>{{ $block->number }}</td>
                                            <td>{{ $block->name}}</td>
                                            <td>{{ $block->start_time }}</td>
                                            <td>{{ $block->end_time }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <a class="btn btn-primary"
                                   href="{{@route('schedules.edit', $schedule)}}">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
