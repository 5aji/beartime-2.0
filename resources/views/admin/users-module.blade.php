<div class="panel panel-default">
    <div class="panel-heading">Users</div>
    <div class="panel-body">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach( as $user)
                <tr>
                    <th>{{ $user->name }}</th>
                    <th>{{ $user->email }}</th>
                    <th>{{ $user->role->name }}</th>
                    <th><a class="btn btn-primary btn-sm" href="{{@route('users.show', $user->id)}}">Edit</a></th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <a class="btn btn-primary" href="{{ @route('users.index') }}">See More</a>
    </div>
</div>