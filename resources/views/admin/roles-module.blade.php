<div class="panel panel-default">
    <div class="panel-heading">Roles</div>
    <div class="panel-body">
        <table class="table">
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
                    <th>{{ $role->name }}</th>
                    <th>{{ $role->description }}</th>
                    <th>{{ $role->users()->count() }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>