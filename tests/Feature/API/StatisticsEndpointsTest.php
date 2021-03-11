<?php

namespace Tests\Feature\API;

use Tests\TestCase;

class StatisticsEndpointsTest extends TestCase
{
    public function test_it_can_return_statistics_object()
    {
        $this->get('/api/statistics')
            ->assertStatus(200)
            ->assertJsonStructure([
                'total_ride_distance',
                'total_run_distance',
                'longest_ride',
                'longest_run',
            ]);
    }
}
