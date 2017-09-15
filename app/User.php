<?php

namespace App;

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
    public function classes() {
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
    public function customizeSchedule(Schedule $schedule) {
        $classes = $this->classes()->get();
        foreach($schedule->blocks()->get() as $block) {
            if ($block->number !== null) {
                // the block has number, find it.

            }
        }
    }
}
