<?php

namespace App\Command;

use App\Service\PriceImporter;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:get:prices',
    description: 'Get ammo prices from dedicated gunstore',
)]
class GetPricesCommand extends Command
{
    private  $priceImporter;

    public function __construct(PriceImporter $priceImporter)
    {
        $this->priceImporter = $priceImporter;

        parent::__construct();
    }


    protected function configure(): void
    {
        $this
            ->addArgument('caliber', InputArgument::OPTIONAL, 'Caliber')
            ->addArgument('store', InputArgument::OPTIONAL, 'store')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $caliber = $input->getArgument('caliber');
        $store = $input->getArgument('store');

        $price = $this->priceImporter->getPrice();


        if ($caliber) {
            $io->note(sprintf('You passed an argument: %s', $caliber));
        }
        if ($store) {
            $io->note(sprintf('You passed an argument: %s', $store));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $io->success(sprintf('Price = %s', $price));

        return Command::SUCCESS;
    }
}
