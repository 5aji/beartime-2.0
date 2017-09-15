<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassConfig extends Model
{
    //
    protected $fillable = [
        'block',
        'name',
        'day',
    ];

    protected $hidden = ['id'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
