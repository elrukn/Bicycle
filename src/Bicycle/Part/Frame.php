<?php

namespace App\Bicycle\Part;

use App\Bicycle\Exception\WheelSizeExceededException;

class Frame extends Part
{
    protected ?string $color;
    protected int     $maxWheelSize;
    protected ?Gears  $gears;
    protected ?Wheels $wheels;
    protected ?Seat   $seat;

    protected ?Brakes    $brakes;
    protected ?Handlebar $handlebar;


    public function __construct(
        ?string    $color,
        ?int        $maxWheelSize = 15,
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
        $this->maxWheelSize = $maxWheelSize;
        parent::__construct($name ?? 'Frame');
    }

    public function validateWheelSize(Wheels $wheels): void
    {
        if ($wheels->getSize() > $this->maxWheelSize) {
            throw new WheelSizeExceededException('Wheel size exceeds the maximum allowed for this frame.');
        }
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setGears(?Gears $gears): void
    {
        $this->gears = $gears;
    }

    public function getGears(): ?Gears
    {
        return $this->gears;
    }

    public function setWheels(Wheels $wheels): void
    {
        $this->validateWheelSize($wheels);
        $this->wheels = $wheels;
    }

    public function getWheels(): ?Wheels
    {
        return $this->wheels;
    }

    public function setSeat(Seat $seat): void
    {
        $this->seat = $seat;
    }

    public function getSeat(): ?Seat
    {
        return $this->seat;
    }

    public function setHandlebar(Handlebar $handlebar): void
    {
        $this->handlebar = $handlebar;
    }

    public function getHandlebar(): ?Handlebar
    {
        return $this->handlebar;
    }

    public function setBrakes(Brakes $brakes): void
    {
        $this->brakes = $brakes;
    }

    public function getBrakes(): ?Brakes
    {
        return $this->brakes;
    }
}


