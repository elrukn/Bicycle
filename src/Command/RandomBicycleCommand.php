<?php

namespace App\Command;

use App\Bicycle\Bicycle;
use App\Bicycle\Part\Brakes;
use App\Bicycle\Part\FrameMedium;
use App\Bicycle\Part\FrameSmall;
use App\Bicycle\Part\Gears;
use App\Bicycle\Part\Handlebar;
use App\Bicycle\Part\Seat;
use App\Bicycle\Part\Wheels;
use App\Bicycle\SimpleBicycle;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RandomBicycleCommand extends Command
{
    private $bicycle;
    protected static $defaultName = 'app:randomBicycle';
    protected static $defaultDescription = 'Add a short description for your command';

    public function __construct()
    {

        $simpleBicycle = new SimpleBicycle('carbon fiber', 1);
        dump($simpleBicycle->isFunctional());


        die;
        $this->bicycle = new Bicycle(new FrameSmall());

        dump($this->bicycle);
        dump($this->bicycle->canRideMessage());

        $colors = [
            'Black',
            'Blue',
            'Brown',
            'Gray',
            'Green',
            'Orange',
            'Pink',
            'Purple',
            'Red',
            'Silver',
            'White',
            'Yellow',
        ];

        $this->bicycle->getFrame()->setColor($colors[array_rand($colors)]);
        $this->bicycle->getFrame()->setHandlebar(new Handlebar());
        $this->bicycle->getFrame()->setSeat(new Seat(10, 1));
        $this->bicycle->getFrame()->setBrakes(new Brakes());
        $this->bicycle->getFrame()->setWheels(new Wheels(21));
        $this->bicycle->getFrame()->setGears(new Gears(10));

        parent::__construct();
    }
    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
//        $arg1 = $input->getArgument('arg1');
//
//        if ($arg1) {
//            $io->note(sprintf('You passed an argument: %s', $arg1));
//        }
//
//        if ($input->getOption('option1')) {
//            // ...
//        }

        dump($this->bicycle);

        dump($this->bicycle->canRide());

//        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
