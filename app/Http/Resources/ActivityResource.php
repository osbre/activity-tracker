<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'type'       => $this->type,
            'start'      => $this->start,
            'finish'     => $this->finish,
            'time_spent' => $this->time_spent,
            'distance'   => $this->distance,
            'speed'      => $this->speed,
        ];
    }
}
