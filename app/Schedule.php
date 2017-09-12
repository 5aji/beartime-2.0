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

}
