<?php

namespace App\DataObjects\Factories;

use App\DataObjects\ActivityData;
use App\Http\Requests\StoreActivityRequest;
use Carbon\Carbon;

final class ActivityDataFactory
{
    public static function makeFromRequest(StoreActivityRequest $request): ActivityData
    {
        $start     = Carbon::createFromFormat(StoreActivityRequest::DATETIME_LOCAL_FORMAT, $request->get('start'));
        $finish    = Carbon::createFromFormat(StoreActivityRequest::DATETIME_LOCAL_FORMAT, $request->get('finish'));

        $timeSpent = $timeSpent = $start->diffInHours($finish);
        $distance  = (int) $request->get('distance');

        return new ActivityData([
            'type'       => $request->get('type'),
            'start'      => $start,
            'finish'     => $finish,
            'time_spent' => $timeSpent,
            'distance'   => $distance,
            'speed'      => (float) $distance / $timeSpent,
        ]);
    }
}
