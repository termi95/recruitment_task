<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Service\InputDataService;
use App\Utils\Utils;

class InputDataCommand extends Command
{
    private $utils;
    private $inputDataService;

    /**
     * @param Utils $utils
     * @param InputDataService $inputDataService
     */
    public function __construct(Utils $utils, InputDataService $inputDataService)
    {
        $this->utils = $utils;
        $this->inputDataService = $inputDataService;
        
        parent::__construct();
    }
    
    /**
     * command configuration
     *
     * @return void
     */
    protected function configure(): void
    {
        $this
            ->setName('app:getGreatestValueOfSequence')
            ->setDescription('Get greatest value of n sequence.')
            ->addArgument('number', InputArgument::REQUIRED, 'Lenght of sequence.');
    }

    /**
     * get greatest value from sequence
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return integer
     */
    protected function execute(InputInterface $input, OutputInterface $output):int
    {
        // get number and pare it for int
        $number = (int)$input->getArgument('number');

        //check is it in range
        if($this->utils->checkIfNumberIsInRange($number))
        {
            // get greatest value
            $greatestValue = $this->inputDataService->getGreatestValueOfSequence($number);

            $output->writeln('Największa wartość ciągu wynosi: ' . $greatestValue);

            return 1;
        }
        
        $output->writeln('Podana wartość powinna być z zakresu: min = ' . Utils::MIN_RANGE . ' max = ' . Utils::MAX_RANGE);

        return 0;
    }
}
