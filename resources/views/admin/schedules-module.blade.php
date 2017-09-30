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
            @foreach(App\Schedule::paginate(10) as  $schedule)
                <tr>
                    <th>{{ $schedule->name }}</th>
                    <th>{{ $schedule->date }}</th>
                    <th><a class="btn btn-primary btn-sm"
                           href="{{@route('schedules.show', $schedule->id)}}">Edit</a></th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <a class="btn btn-primary"
           href="{{@route('schedules.index')}}">Show More</a>
    </div>
</div>