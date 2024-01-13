<?php

namespace App\Bicycle;

use App\Bicycle\Part\Frame;
use App\Bicycle\Part\Wheels;
use App\Bicycle\Part\Seat;
use App\Bicycle\Part\Handlebar;
use App\Bicycle\Part\Gears;
use App\Bicycle\Part\Brakes;

class Bicycle {
    private Frame $frame;

    public function __construct(Frame $frame) {
        $this->frame = $frame;
    }

    public function getFrame(): Frame
    {
        return $this->frame;
    }


    /**
     *  using annotation because PHP 7.4 doesn't support mixed return types
     * @return array|bool
     */
    public function canRide()
    {
        $missingParts = [];

        // Check each part of the bicycle. If it's missing, add to $missingParts array.
        if ($this->getFrame()->getGears() === null) {
            $missingParts[] = 'Gears';
        }
        if ($this->getFrame()->getWheels() === null) {
            $missingParts[] = 'Wheels';
        }
        if ($this->getFrame()->getSeat() === null) {
            $missingParts[] = 'Seat';
        }
        if ($this->getFrame()->getHandlebar() === null) {
            $missingParts[] = 'Handlebar';
        }
        if ($this->getFrame()->getBrakes() === null) {
            $missingParts[] = 'Brakes';
        }

        // If we have any missing parts, return them.
        if (!empty($missingParts)) {
            return $missingParts;
        }

        // If no parts are missing, return true as bicycle can be ridden.
        return true;
    }

    /**
     * @return string
     */
    public function canRideMessage()
    {
        $canRide = $this->canRide();

        if ($canRide === true) {
            return 'This bicycle can be ridden.';
        }

        return 'This bicycle cannot be ridden. Missing parts: ' . implode(', ', $canRide);
    }
}