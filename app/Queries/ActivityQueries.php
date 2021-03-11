<?php

namespace App\Queries;

use App\DataObjects\ActivityData;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Collection;

final class ActivityQueries
{
    public static function getAll(): Collection
    {
        return Activity::orderByDesc('id')->get();
    }

    public static function create(ActivityData $data): Activity
    {
        return Activity::create($data->toArray());
    }

    public static function sumDistanceForType(string $type): int|float
    {
        return Activity::whereType($type)->sum('distance');
    }

    public static function selectLongestForType(string $type): Activity
    {
        return Activity::longest()->whereType($type)->first();
    }
}
