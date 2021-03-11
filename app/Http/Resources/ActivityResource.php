<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'                  => $this->id,
            'type'                => $this->type,
            'type_readable'       => $this->type_readable,
            'date_readable'       => $this->start->format('F j'),
            'date_readable_short' => $this->start->format('M j'),
            'start'               => $this->start,
            'finish'              => $this->finish,
            'time_spent'          => (float) $this->time_spent,
            'time_spent_readable' => $this->time_spent_readable,
            'distance'            => (float) $this->distance,
            'distance_readable'   => $this->distance_readable,
            'speed'               => round($this->speed, 1),
        ];
    }
}
