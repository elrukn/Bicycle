<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Bicycle\SimpleBicycle;

class SimpleBicycleTest extends TestCase
{
    /**
     * Test the getFrame method of the SimpleBicycle class.
     */
    public function testGetFrame()
    {
        $simpleBicycle = new SimpleBicycle('carbon');
        $this->assertSame('carbon', $simpleBicycle->getFrame());
    }
}