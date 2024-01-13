<?php

namespace App\Tests\Command;

use App\Command\BrokenBicycleCommand;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Command\Command;

class BrokenBicycleCommandTest extends KernelTestCase
{
    protected static function getKernelClass()
    {
        return \App\Kernel::class;
    }

    public function testExecute()
    {
        // Boot the Symfony kernel
        $kernel = static::createKernel();
        $kernel->boot();

        // Create a new Application
        $application = new Application($kernel);

        // Add the BrokenBicycleCommand to the Application
        $application->add(new BrokenBicycleCommand());

        // Create a CommandTester and execute the command
        $command = $application->find('app:brokenBicycle');
        $commandTester = new CommandTester($command);
        $commandTester->execute([]);

        // Assert the output of the command
        $this->assertStringContainsString('Error:', $commandTester->getDisplay());

        $expectedErrorMessage = 'Invalid brakes value';
        $this->assertStringContainsString($expectedErrorMessage, $commandTester->getDisplay());


        // Assert the command returns success
        $this->assertEquals(Command::FAILURE, $commandTester->getStatusCode());
    }
}
