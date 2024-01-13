<?php

namespace Tests\App\Command;

use App\Command\SimpleBicycleCommand;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Console\Command\Command;

class SimpleBicycleCommandTest extends KernelTestCase
{
    private CommandTester $commandTester;

    protected static function getKernelClass()
    {
        return \App\Kernel::class;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $kernel              = static::createKernel();
        $application         = new Application($kernel);
        $command             = $application->find(SimpleBicycleCommand::getDefaultName());
        $this->commandTester = new CommandTester($command);
    }

    public function testExecuteWithDefaults(): void
    {
        $this->commandTester->execute([]);

        $expectedOutput = "Bicycle Details:\n"
            . "Frame: aluminium\n"
            . "Wheels: 2\n"
            . "Brakes: disc\n"
            . "Seat: standard\n"
            . "Handlebar: flat\n\n";

        $this->assertStringContainsString($expectedOutput, $this->commandTester->getDisplay());
        $this->assertEquals(Command::SUCCESS, $this->commandTester->getStatusCode());
    }

    public function testExecuteWithArguments(): void
    {
        $tester = $this->commandTester;
        $tester->execute([
            'frame'     => 'steel',
            'brakes'    => 'drum',
            'seat'      => 'comfort',
            'handlebar' => 'bullhorn',
        ]);


        $expectedOutput = "Bicycle Details:\n"
            . "Frame: steel\n"
            . "Wheels: 2\n"
            . "Brakes: drum\n"
            . "Seat: comfort\n"
            . "Handlebar: bullhorn\n";

        $this->assertStringContainsString($expectedOutput, $tester->getDisplay());
        $this->assertEquals(Command::SUCCESS, $tester->getStatusCode());
    }

    public function testExecuteWithInvalidFrame(): void
    {
        $tester = $this->commandTester;
        $tester->execute(['frame' => 'invalidFrame']);

        $expectedErrorOutput = "Error:\nInvalid frame value";
        $this->assertStringContainsString($expectedErrorOutput, $tester->getDisplay());
        $this->assertEquals(Command::FAILURE, $tester->getStatusCode());
    }

    public function testExecuteWithInvalidBrakes(): void
    {
        $tester = $this->commandTester;
        $tester->execute(['brakes' => 'invalidBrakes']);

        $expectedErrorOutput = "Error:\nInvalid brakes value";
        $this->assertStringContainsString($expectedErrorOutput, $tester->getDisplay());
        $this->assertEquals(Command::FAILURE, $tester->getStatusCode());
    }

    public function testExecuteWithInvalidSeat(): void
    {
        $tester = $this->commandTester;
        $tester->execute([
            'seat' => 'null'
        ]);

        $expectedErrorOutput = "Error:\nInvalid seat value";
        $this->assertStringContainsString($expectedErrorOutput, $tester->getDisplay());
        $this->assertEquals(Command::FAILURE, $tester->getStatusCode());
    }

    public function testExecuteWithInvalidHandlebar(): void
    {
        $tester = $this->commandTester;
        $tester->execute(['handlebar' => 'invalidHandlebar']);

        $expectedErrorOutput = "Error:\nInvalid handlebar value";
        $this->assertStringContainsString($expectedErrorOutput, $tester->getDisplay());
        $this->assertEquals(Command::FAILURE, $tester->getStatusCode());
    }


    protected function tearDown(): void
    {
        unset($this->commandTester);
        parent::tearDown();
    }
}