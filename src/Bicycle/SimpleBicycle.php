<?php

namespace App\Bicycle;

class SimpleBicycle
{
    private string $frame;
    private int    $wheels;
    private string $brakes;
    private string $seat;
    private string $handlebar;

    private array $allowedFrames     = ['aluminium', 'steel'];
    private array $allowedBrakes     = ['disc', 'drum'];
    private array $allowedHandlebars = ['flat', 'drop', 'bullhorn'];

    /**
     * @param string $frame
     * @param int $wheels
     * @param string $brakes
     * @param string $seat
     * @param string $handlebar
     */
    public function __construct(string $frame = 'aluminium', int $wheels = 2, string $brakes = 'disc', string $seat = 'standard', string $handlebar = 'flat')
    {
        $this->setFrame($frame);
        $this->setWheels($wheels);
        $this->setBrakes($brakes);
        $this->setSeat($seat);
        $this->setHandlebar($handlebar);
    }

    /**
     * @return string
     */
    public function getFrame(): string
    {
        return $this->frame;
    }

    /**
     * @param string $frame
     * @return void
     */
    public function setFrame(string $frame): void
    {
        if (!in_array($frame, $this->allowedFrames)) {
            throw new \InvalidArgumentException('Invalid frame value');
        }
        $this->frame = $frame;
    }

    /**
     * @return int
     */
    public function getWheels(): int
    {
        return $this->wheels;
    }

    /**
     * @param int $wheels
     * @return void
     */
    public function setWheels(int $wheels): void
    {
        if ($wheels < 1) {
            throw new \InvalidArgumentException('Invalid number of wheels');
        }
        $this->wheels = $wheels;
    }

    /**
     * @return string
     */
    public function getBrakes(): string
    {
        return $this->brakes;
    }

    /**
     * @param string $brakes
     * @return void
     */
    public function setBrakes(string $brakes): void
    {
        if (!in_array($brakes, $this->allowedBrakes)) {
            throw new \InvalidArgumentException('Invalid brakes value');
        }
        $this->brakes = $brakes;
    }

    /**
     * @return string
     */
    public function getSeat(): string
    {
        return $this->seat;
    }

    /**
     * @param string $seat
     * @return void
     */
    public function setSeat(string $seat): void
    {
        if (empty($seat)) {
            throw new \InvalidArgumentException('Invalid seat value');
        }
        $this->seat = $seat;
    }

    /**
     * @return string
     */
    public function getHandlebar(): string
    {
        return $this->handlebar;
    }

    /**
     * @param string $handlebar
     * @return void
     */
    public function setHandlebar(string $handlebar): void
    {
        if (!in_array($handlebar, $this->allowedHandlebars)) {
            throw new \InvalidArgumentException('Invalid handlebar value');
        }
        $this->handlebar = $handlebar;
    }

    /**
     * @return bool
     */
    public function isFunctional(): bool
    {
        return $this->frame && $this->wheels === 2 && $this->brakes && $this->seat && $this->handlebar;
    }

    /**
     * @return string
     */
    public function displayDetails(): string
    {
        $details = "Bicycle Details:\n";
        $details .= "Frame: " . $this->getFrame() . "\n";
        $details .= "Wheels: " . $this->getWheels() . "\n";
        $details .= "Brakes: " . $this->getBrakes() . "\n";
        $details .= "Seat: " . $this->getSeat() . "\n";
        $details .= "Handlebar: " . $this->getHandlebar() . "\n";
        return $details;
    }
}