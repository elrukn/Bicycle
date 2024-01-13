<?php

namespace App\Bicycle\Part;

class Handlebar extends Part
{
    public function __construct(?string $name = null)
    {
        parent::__construct($name ?? 'Handlebar');
    }
}