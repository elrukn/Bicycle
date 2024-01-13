<?php

namespace App\Bicycle\Part;

class FrameMedium extends Frame
{
    public function __construct(?string    $color,
                                           $maxWheelSize = null,
                                ?Gears     $gears = null,
                                ?Wheels    $wheels = null,
                                ?Seat      $seat = null,
                                ?Handlebar $handlebar = null,
                                ?Brakes    $brakes = null,
                                ?string    $name = null)
    {
        $this->color        = $color;
        $this->gears        = $gears;
        $this->wheels       = $wheels;
        $this->seat         = $seat;
        $this->handlebar    = $handlebar;
        $this->brakes       = $brakes;
        $this->maxWheelSize = $maxWheelSize ?? 18;

        parent::__construct($color, $this->maxWheelSize, $gears, $wheels, $seat, $handlebar, $brakes, $name ?? 'Frame: Small');

    }

}