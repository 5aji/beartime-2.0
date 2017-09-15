<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Schedule;

class ScheduleDayTest extends TestCase
{
    public function testDayFunctionReturnsASchedule() {
        $this->assertInstanceOf(Schedule::class, Schedule::day());
    }

    public function testDayReturnsAScheduleWithBlocks() {
        $schedule = Schedule::day();
        $this->assertNotNull($schedule->blocks());
    }
    public function testDayReturnsCorrectScheduleForDate() {
        // we'll use today as example. tuesday
        $date = '2017-09-12';
        $this->assertEquals(Schedule::day($date), Schedule::find(2));
    }
    public function testDayReturnsSpecialScheduleWhenOneExists() {
        //use factory to make special schedule, take the date of it, load into funciton, compare id.
        $special_schedule = factory(Schedule::class)->states(['special'])->create();
        $this->assertEquals($special_schedule->id, Schedule::day($special_schedule->date)->id);
        $special_schedule->delete();
    }
}
