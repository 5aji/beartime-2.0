<?php

namespace Tests\Unit;

use App\Schedule;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ScheduleWeekTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testWeekReturnsAnArrayWithFiveEntries() {
        $week = Schedule::week();
        $length = count($week);
        $this->assertEquals($length, 5);
    }
    public function testWeekIncludesCustomSchedules() {
        $custom = factory(Schedule::class)->states(['special'])->create(['date' => '2017-09-15']);
        $week = Schedule::week($custom->date);
        $this->assertEquals($week['Friday']->id, $custom->id);
        $custom->delete;
    }
}
