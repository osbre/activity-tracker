<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Activity extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    protected $dates = [
        'start',
        'finish',
    ];

    public function scopeLongest($query)
    {
        return $query->orderByDesc('distance');
    }
}
