<?php

namespace App\Command;

use App\Bicycle\Bicycle;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BrokenBicycleCommand extends Command
{
    protected static $defaultName = 'app:brokenBicycle';
    protected static $defaultDescription = 'Demo console command. Attempting to create an instance with invalid parameters.';


    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            // Attempt to create an instance with invalid parameters
            $simpleBicycle = new Bicycle('steel', 3, 'hand', '', 'bullhorn');

            // Print the details of the second bicycle
            $output->writeln($simpleBicycle->displayDetails());
        } catch (\InvalidArgumentException $e) {
            // Output the error message
            $output->writeln([
                '<error>Error:</error>',
                $e->getMessage(),
            ]);

            return Command::FAILURE;
        }

        // This line will never be reached
        return Command::SUCCESS;
    }
}
