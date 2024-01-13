<?php

namespace App\Bicycle;

class SimpleBicycle
{
    private $frame;
    private $wheels;
    private $brakes;
    private $seat;
    private $handlebar;

    public function __construct(string $frame = 'aluminum', int $wheels = 2, string $brakes = 'disc', string $seat = 'standard', string $handlebar = 'flat') {
        $this->frame = $frame;
        $this->wheels = $wheels;
        $this->brakes = $brakes;
        $this->seat = $seat;
        $this->handlebar = $handlebar;
    }

    // Getters and setters with type hinting
    public function getFrame(): string {
        return $this->frame;
    }

    public function setFrame(string $frame) {
        $this->frame = $frame;
    }

    // Similar getters and setters for wheels, brakes, seat, and handlebar

    public function isFunctional(): bool {
        return $this->frame && $this->wheels === 2 && $this->brakes && $this->seat && $this->handlebar;
    }

    public function displayDetails(): string {
        $details = "Bicycle Details:\n";
        $details .= "Frame: " . $this->getFrame() . "\n";
        $details .= "Wheels: " . $this->wheels . "\n";
        $details .= "Brakes: " . $this->brakes . "\n";
        $details .= "Seat: " . $this->seat . "\n";
        $details .= "Handlebar: " . $this->handlebar . "\n";
        return $details;
    }
}