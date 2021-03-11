<?php

namespace App\Queries;

use App\DataObjects\ActivityData;
use App\Models\Activity;

final class ActivityQueries
{
    public static function getAll()
    {
        return Activity::orderByDesc('finish')->get();
    }

    public static function create(ActivityData $data)
    {
        return Activity::create($data->toArray());
    }
}
