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
        return ActivityCollection::make(ActivityQueries::getAll())
            ->additional([
                'meta' => [
                    'total_ride_distance' => ActivityQueries::sumDistanceForType('ride'),
                    'total_run_distance'  => ActivityQueries::sumDistanceForType('run'),
                    'longest_ride'        => ActivityQueries::selectLongestForType('ride'),
                    'longest_run'         => ActivityQueries::selectLongestForType('run'),
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
