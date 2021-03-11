<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

final class Activity extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    protected $appends = [
        'type_readable',
        'time_spent_readable',
        'distance_readable',
    ];

    protected $dates = [
        'start',
        'finish',
    ];

    public function scopeLongest($query)
    {
        return $query->orderByDesc('distance');
    }

    public function getTimeSpentReadableAttribute()
    {
        return $this->time_spent.' '.Str::plural('hour', $this->time_spent);
    }

    public function getTypeReadableAttribute()
    {
        $emoji = match ($this->type) {
            'ride' => '🚴',
            'run'  => '🏃',
            default => '',
        };

        return sprintf("%s %s", ucfirst($this->type), $emoji);
    }


    public function getDistanceReadableAttribute()
    {
        return "{$this->distance} km";
    }
}
