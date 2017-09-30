<?php

namespace App;

use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $fillable = [
        'id',
        'name',
        'date',
    ];

    protected $with = [
        'blocks'
    ];
    public function blocks()
    {
        return $this->hasMany('App\Block');
    }

    /**
     * @param string $date optional date to check.
     * @return Schedule $today the schedule for that day.
     */
    public static function day($date = null)
    {
        if ($date == null) {
            $date = Carbon::now();
        } else {
            $date = new Carbon($date);
        }

        if (Schedule::where('date', $date->toDateString())->exists()) {
            // there is a custom schedule for that date.
            return Schedule::where('date', $date->toDateString())->first();
        } else {
            // we are given a date but there is no schedule. return DOTW.
            return Schedule::where('name', $date->format('l'))->first();
        }

    }

    /**
     * Returns an array of schedules for the specified week.
     * @param DateTime $date A day of the week (any day works)
     * @return array $week
     */
    public static function week($date = null)
    {
        if ($date == null) {
            $date = Carbon::now();
        } else {
            $date = new Carbon($date);
        }
        
        $date->startOfWeek();
        $week = array();
        for ($i = 1; $i <= 5; $i++) {
            $schedule = Schedule::day($date);
            $week[$date->format('l')] = $schedule;
            $date->addDay();
        }
        return $week;
    }
}
