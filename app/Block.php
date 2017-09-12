<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    //
    protected $fillable = [
        'number',
        'name',
        'start_time',
        'end_time',
        'schedule_id'
    ];

    public function schedule() {
        return $this->belongsTo('App\Schedule');
    }
}
