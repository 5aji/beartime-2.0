<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function classConfigs() {
        return $this->hasMany('App\ClassConfig');
    }

    public function role() {
        return $this->belongsTo('App\Role');
    }

    /**
     * Returns true if the user has any of the roles
     * @param array $roles Roles to check (all lowercase)
     * @return bool
     */
    public function hasRoles($roles) {
        return in_array(strtolower($this->role()->first()->name), $roles);
    }

    /**
     * Returns a custom schedule for the user.
     * @param Schedule $schedule The schedule to process
     * @return Schedule $output The output
     */
    //TODO: Finish this function
    public function customizeSchedule(Schedule $schedule) {
        if ($schedule->date == null) {
            // no date, use id
            $scheduleDotw = $schedule->id;
        } else {
            // date, parse it with carbon and get dotw
            $scheduleDotw = Carbon::parse($schedule->date)->dayOfWeek;
        }
        // get all class configs where date matches schedule or doesn't exist.
        $classConfigs = $this->classConfigs()->where('day', null)->orWhere('day', $scheduleDotw);
        foreach($classConfigs->whereNotNull('day')->get() as $key=>$val) {
            $classConfigs->whereNull('day');
        }
        foreach($schedule->blocks()->get() as $block) {
            if ($block->number !== null) {
                // the block has number, find it in the config
                $block->name = $classConfigs->where('name', $block->name)->name;
            }
        }
        return $schedule;
    }
}
