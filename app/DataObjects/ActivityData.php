<?php

namespace App\DataObjects;

use Spatie\DataTransferObject\DataTransferObject;

final class ActivityData extends DataTransferObject
{
    public string $type;

    public \DateTime $start;
    public \DateTime $finish;

    public int $time_spent;

    public int $distance;
    public float $speed;
}
