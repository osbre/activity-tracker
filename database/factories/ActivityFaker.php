<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFaker extends Factory
{
    protected $model = Activity::class;

    public function definition(): array
    {
        $start = $this->faker->dateTime();

        $finish = clone $start;
        $finish->modify('+ 2 hour');

        return [
            'type' => $this->faker->randomElement(['run', 'ride']),
            'start' => $start,
            'finish' => $finish,
            'distance' => $this->faker->numberBetween(0, 500),
            'speed' => $this->faker->numberBetween(0, 100),
        ];
    }
}
