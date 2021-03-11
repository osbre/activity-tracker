<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'             => $this->id,
            'type'           => $this->type,
            'date_readable'  => $this->start->format('F j'),
            'start'          => $this->start,
            'finish'         => $this->finish,
            'time_spent'     => (float) $this->time_spent,
            'distance'       => (float) $this->distance,
            'speed'          => (float) $this->speed,
        ];
    }
}
