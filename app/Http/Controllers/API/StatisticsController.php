<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Queries\ActivityQueries;
use Illuminate\Http\JsonResponse;

class StatisticsController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'total_ride_distance' => ActivityQueries::sumDistanceForType('ride'),
            'total_run_distance'  => ActivityQueries::sumDistanceForType('run'),
            'longest_ride'        => ActivityQueries::selectLongestForType('ride'),
            'longest_run'         => ActivityQueries::selectLongestForType('run'),
        ]);
    }
}
