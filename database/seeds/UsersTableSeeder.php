<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create the initial admin user.
        $admin = User::create([
            'name' => env('ADMIN_NAME'),
            'email' => env('ADMIN_EMAIL'),
            'password' => bcrypt(env('ADMIN_PASSWORD')),
        ]);
        $adminRole = Role::find(3);
        $admin->role()->associate($adminRole)->save();



        // add some dummy users if local/testing
        if(App::environment('local')) {
            factory(User::class,10)->create()->each(function ($u) {
                $u->role()->associate(Role::find(1));
                $u->classes()->saveMany(factory(App\ClassConfig::class, 2)->make());
                $u->classes()->save(factory(App\ClassConfig::class)->states(['single_day'])->make());
            });
        }
    }
}
