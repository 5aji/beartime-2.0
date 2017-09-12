<?php

use Illuminate\Database\Seeder;
use App\Schedule;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // kill the noise
        DB::table('schedules')->delete();
        foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] as $dotw) {
            factory(Schedule::class)->create(["name" => $dotw]);
        }


        if (App::environment('local')) {
            factory(Schedule::class, 3)->states(['special'])->create();
        }
    }
}
