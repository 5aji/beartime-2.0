<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $fillable = [
        'id',
        'name',
        'date',
    ];
    /*
    protected $with = [
        'blocks'
    ];
    */
    public function blocks() {
        return $this->hasMany('App\Block');
    }

    /**
     * @param string $date optional date to check.
     * @return Schedule $today the schedule for that day.
     */
    public static function day($date = null) {
        if ((date('Y-m-d', strtotime($date)) == $date)) {
            if (Schedule::where('date', $date)->exists()) {
                // there is a custom schedule for that date.
                return Schedule::where('date', $date)->first();
            } else {
                // we are given a date but there is no schedule. return DOTW.
                return Schedule::where('name', date('l', strtotime($date)))->first();
            }
        }
        return Schedule::where('name', date('l'))->first();
    }
}
