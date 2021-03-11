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
        return response()->json(new ActivityCollection(
            ActivityQueries::getAll()
        ));
    }

    public function store(StoreActivityRequest $request): JsonResponse
    {
        $data   = ActivityDataFactory::makeFromRequest($request);
        $entity = ActivityQueries::create($data);

        return response()->json(new ActivityResource($entity), 201);
    }
}
