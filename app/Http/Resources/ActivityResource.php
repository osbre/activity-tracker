<?php

namespace App\Http\Resources;

use Illuminate\Http\{JsonResponse, Request};

class ActivityResource extends JsonResponse
{
    public function toArray(Request $request): array
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
