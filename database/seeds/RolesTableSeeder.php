<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // the user role should be id 1
        $userRole = Role::create([
            'name' => 'User',
            'description' => 'A general user of the program',
        ])->save();

        $modRole = Role::create([
            'name' => 'Moderator',
            'description' => 'A manager of schedules and announcements.'
        ]);

        $adminRole = Role::create([
            'name' => 'Admin',
            'description' => 'A manager of roles and creator of the universe.'
        ])->save();


    }
}
