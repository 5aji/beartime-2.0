<div class="ui segments">
    <div class="ui segment">
        <h1 class="ui header">Roles</h1>
    </div>
    <div class="ui segment">
        <table class="ui celled table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Members</th>
            </tr>
            </thead>
            <tbody>
            @foreach(App\Role::all() as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->description }}</td>
                    <td>{{ $role->users()->count() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>