<?php

namespace App\Command;

use App\Bicycle\SimpleBicycle;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SimpleBicycleCommand extends Command
{
    private SimpleBicycle $simpleBicycle;
    protected static $defaultName = 'app:simpleBicycle';
    protected static $defaultDescription = 'Add a short description for your command';

    /**
     * SimpleBicycleCommand constructor.
     * @param SimpleBicycle $simpleBicycle
     *
     * Constructor Creates a valid SimpleBicycle instance
     */

    public function __construct(SimpleBicycle $simpleBicycle)
    {
        $this->simpleBicycle = $simpleBicycle;

        parent::__construct();
    }

    protected function configure(): void
    {
        // set an argument for frame, brakes, seat and handlebar
        $this
            ->addArgument('frame', InputArgument::OPTIONAL, 'Frame description')
            ->addArgument('brakes', InputArgument::OPTIONAL, 'Brakes description')
            ->addArgument('seat', InputArgument::OPTIONAL, 'Seat description')
            ->addArgument('handlebar', InputArgument::OPTIONAL, 'Handlebar description');


    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            // set arguments if provided
            // exceptions will be thrown if invalid

            if ($input->getArgument('frame')) {
                $this->simpleBicycle->setFrame($input->getArgument('frame'));
            }

            if ($input->getArgument('brakes')) {
                $this->simpleBicycle->setBrakes($input->getArgument('brakes'));
            }

            if ($input->getArgument('seat')) {
                $seat = $input->getArgument('seat');
                if ($seat == 'null') {
                    $seat = '';
                }
                $this->simpleBicycle->setSeat($seat);
            }

            if ($input->getArgument('handlebar')) {
                $this->simpleBicycle->setHandlebar($input->getArgument('handlebar'));
            }

            // Print the details
            $output->writeln($this->simpleBicycle->displayDetails());
        } catch (\InvalidArgumentException $e) {
            // Output the error message
            $output->writeln([
                '<error>Error:</error>',
                $e->getMessage(),
            ]);

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
