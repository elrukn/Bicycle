<?php

namespace Tests\App\Bicycle;

use App\Bicycle\SimpleBicycle;
use PHPUnit\Framework\TestCase;

class SimpleBicycleTest extends TestCase
{
    public function testCreationWithDefaultValues()
    {
        $bicycle = new SimpleBicycle();
        $this->assertSame('aluminium', $bicycle->getFrame());
        $this->assertSame(2, $bicycle->getWheels());
        $this->assertSame('disc', $bicycle->getBrakes());
        $this->assertSame('standard', $bicycle->getSeat());
        $this->assertSame('flat', $bicycle->getHandlebar());
    }

    public function testCreationWithCustomValues()
    {
        $bicycle = new SimpleBicycle('steel', 2, 'drum', 'comfort', 'drop');
        $this->assertSame('steel', $bicycle->getFrame());
        $this->assertSame(2, $bicycle->getWheels());
        $this->assertSame('drum', $bicycle->getBrakes());
        $this->assertSame('comfort', $bicycle->getSeat());
        $this->assertSame('drop', $bicycle->getHandlebar());
    }

    public function testCreationFailsWithInvalidFrame()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid frame value');
        $bicycle = new SimpleBicycle('invalidFrame');
    }

    public function testCreationFailsWithInvalidWheels()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid number of wheels');
        $bicycle = new SimpleBicycle('steel', 0);
    }

    public function testCreationFailsWithInvalidBrakes()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid brakes value');
        $bicycle = new SimpleBicycle('steel', 2, 'rim');
    }

    public function testCreationFailsWithEmptySeat()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid seat value');
        $bicycle = new SimpleBicycle('steel', 2, 'disc', '');
    }

    public function testCreationFailsWithInvalidHandlebar()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid handlebar value');
        $bicycle = new SimpleBicycle('steel', 2, 'disc', 'comfort', 'apehanger');
    }

    public function testInvalidFrameAfterConstruction()
    {
        $bicycle = new SimpleBicycle();
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid frame value');
        $bicycle->setFrame('invalidFrame');
    }

    public function testInvalidWheelsAfterConstruction()
    {
        $bicycle = new SimpleBicycle();
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid number of wheels');
        $bicycle->setWheels(0);
    }

    /**
     * All the params in the constructor will throw exceptions if invalid.
     * This test is here to get 100% coverage.
     */
    public function testIsFunctional()
    {
        $bicycle = new SimpleBicycle('steel', 2, 'disc', 'comfort', 'drop');
        $this->assertTrue($bicycle->isFunctional());
    }

    public function testDisplayDetails()
    {
        $bicycle = new SimpleBicycle('steel', 3, 'drum', 'comfort', 'drop');

        $expected = "Bicycle Details:\n"
            . "Frame: steel\n"
            . "Wheels: 3\n"
            . "Brakes: drum\n"
            . "Seat: comfort\n"
            . "Handlebar: drop\n";

        $this->assertSame($expected, $bicycle->displayDetails());
    }
}