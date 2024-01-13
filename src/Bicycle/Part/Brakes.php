<?php

namespace App\Bicycle\Part;

class Brakes extends Part
{
    public function __construct(?string $name = null)
    {
        parent::__construct($name ?? 'Brakes');
    }
}