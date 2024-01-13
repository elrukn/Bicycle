<?php

namespace App\Bicycle\Part;

use App\Bicycle\Exception\SeatHeightExceededException;

class Seat
{
    private int $currentHeight;
    private int $maxHeight;

    /**
     * @throws SeatHeightExceededException
     */
    public function __construct(int $maxHeight = 0, int $currentHeight = 0)
    {
        $this->maxHeight = $maxHeight;
        $this->setCurrentHeight($currentHeight);
    }

    public function getCurrentHeight(): int
    {
        return $this->currentHeight;
    }

    /**
     * @throws SeatHeightExceededException
     */
    public function setCurrentHeight(int $currentHeight): void
    {
        if ($currentHeight > $this->maxHeight) {
            throw new SeatHeightExceededException('Seat height exceeds the maximum limit.');
        }

        $this->currentHeight = $currentHeight;
    }
}
