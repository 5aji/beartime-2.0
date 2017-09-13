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
}
