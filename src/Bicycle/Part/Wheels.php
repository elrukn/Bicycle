<?php

namespace App\Bicycle\Part;

class Wheels
{
    private int $size;

    public function __construct(int $size = 0)
    {
        $this->size = $size;
    }

    public function getSize(): int
    {
        return $this->size;
    }
}