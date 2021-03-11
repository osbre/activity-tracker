<?php

namespace App\Http\Controllers\API;

use App\DataObjects\Factories\ActivityDataFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreActivityRequest;
use App\Queries\ActivityQueries;
use Illuminate\Http\JsonResponse;

final class ActivityController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(ActivityQueries::getAll());
    }

    public function store(StoreActivityRequest $request): JsonResponse
    {
        $data   = ActivityDataFactory::makeFromRequest($request);
        $entity = ActivityQueries::create($data);

        return response()->json($entity, 201);
    }
}
