<?php

namespace App\Http\Controllers\API;

use App\DataObjects\Factories\ActivityDataFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Resources\{ActivityCollection, ActivityResource};
use App\Queries\ActivityQueries;
use Illuminate\Http\JsonResponse;

final class ActivityController extends Controller
{
    public function index(): JsonResponse
    {
        $longestRide = ActivityQueries::selectLongestForType('ride');
        $longestRun  = ActivityQueries::selectLongestForType('run');
        $totalRideDistance = ActivityQueries::sumDistanceForType('ride');
        $totalRunDistance  = ActivityQueries::sumDistanceForType('run');

        return ActivityCollection::make(ActivityQueries::getAll())
            ->additional([
                'meta' => [
                    'total_ride_distance' => $totalRideDistance,
                    'total_run_distance'  => $totalRunDistance,
                    'longest_ride'        => ActivityResource::make($longestRide),
                    'longest_run'         => ActivityResource::make($longestRun),
                ],
            ])->response();
    }

    public function store(StoreActivityRequest $request): JsonResponse
    {
        $data   = ActivityDataFactory::makeFromRequest($request);
        $entity = ActivityQueries::create($data);

        return ActivityResource::make($entity)
            ->response()
            ->setStatusCode(201);
    }
}
