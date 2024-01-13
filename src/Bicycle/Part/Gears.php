<?php

namespace App\Bicycle\Part;

class Gears extends Part
{
    private int $minGear = 1;
    private int $maxGear;
    private int $currentGear;

    public function __construct(int $maxGear = 1, ?int $currentGear = null,?string $name = null)
    {
        $this->maxGear     = $maxGear;
        $this->currentGear = $currentGear ?? $this->minGear;
        parent::__construct($name ?? 'Gears');
    }

    public function shiftGear(int $gear): void
    {
        if ($gear < $this->minGear || $gear > $this->maxGear) {
            throw new \InvalidArgumentException("Invalid gear: Gear must be between {$this->minGear} and {$this->maxGear}.");
        }
        $this->currentGear = $gear;
    }

    public function shiftUp(): void
    {
        if ($this->currentGear === $this->maxGear) {
            throw new \InvalidArgumentException("Invalid gear: Cannot shift up from {$this->currentGear}.");
        }
        $this->currentGear++;
    }

    public function shiftDown(): void
    {
        if ($this->currentGear === $this->minGear) {
            throw new \InvalidArgumentException("Invalid gear: Cannot shift down from {$this->currentGear}.");
        }
        $this->currentGear--;
    }

    public function getCurrentGear(): int
    {
        return $this->currentGear;
    }
}