<?php

namespace Tests\Feature\API;

use Database\Factories\ActivityFaker;
use Tests\TestCase;

class ActivityEndpointsTest extends TestCase
{
    const DATETIME_FORMAT = 'Y-m-d\TH:i';

    public function test_it_can_validate_data()
    {
        $this->postJson('/api/activities')
            ->assertStatus(422)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'start',
                    'finish',
                    'distance',
                    'type',
                ]
            ]);
    }

    public function test_it_can_save_entity()
    {
        $data = ActivityFaker::new()->make();

        $this->post('/api/activities', array_merge($data->toArray(), [
            'start'  => $data->start->format(self::DATETIME_FORMAT),
            'finish' => $data->finish->format(self::DATETIME_FORMAT),
        ]))->assertJsonStructure([
            'data' => [
                'id',
                'type',
                'start',
                'finish',
                'time_spent',
            ],
        ])->assertStatus(201);
    }

    public function test_it_can_return_list_of_entities()
    {
        $this->get('/api/activities')
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    [
                        'id',
                        'type',
                        'start',
                        'finish',
                        'time_spent'
                    ],
                ],
                'meta' => [
                    'total_ride_distance',
                    'total_run_distance',
                    'longest_ride',
                    'longest_run',
                ],
            ]);
    }
}
