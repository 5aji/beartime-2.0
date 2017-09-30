<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\Resource;

class Block extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $start_time = Carbon::createFromFormat('H:i:s', $this->start_time);
        $end_time = Carbon::createFromFormat('H:i:s', $this->end_time);
        $duration = $start_time->diffInMinutes($end_time);
        return [
            'number' => $this->number,
            'name' => $this->name,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'duration' => $duration
        ];
    }
}
