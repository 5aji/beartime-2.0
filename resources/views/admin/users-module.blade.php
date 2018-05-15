<div class="ui segments">
    <div class="ui segment">
        <h1 class="ui header">Users</h1>
    </div>
    <div class="ui segment">
        <table class="ui celled table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td><a class="btn btn-primary btn-sm" href="{{@route('users.show', $user->id)}}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="ui segment">
        <a class="ui primary button" href="{{ @route('users.index') }}">See More</a>
    </div>
</div>