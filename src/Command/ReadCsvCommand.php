<?php

namespace Banpagi\Trading212\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Banpagi\Trading212\CvsTransformer;
use Banpagi\Trading212\CsvReader;


#[AsCommand(
    name: 'app:process',
    description: 'Reads a trading212 export file and transform it into useful data',
)]
class ReadCsvCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument('filename', InputArgument::REQUIRED, 'filename to process')
            ->addArgument('delimiter', InputArgument::OPTIONAL, 'field delimiter')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $filename = $input->getArgument('filename');
        

        if ($filename) {
            $io->note(sprintf('You passed an argument: %s', $filename));
        }

        $reader = new CsvReader($filename);
        $reader->setFieldDelimiter(',');
    

        if ($input->hasArgument('delimiter') && $input->getArgument('delimiter')) {
            $delimiter = $input->getArgument('delimiter');
            $reader->setFieldDelimiter($delimiter);
        }
        $rows = $reader->getRows();
       
        $io->writeln("Number of rows in file: " . count($rows));
        $worker = new CvsTransformer();
        $data = $worker->process($filename, $rows);

        dump($data->getTransaction());
        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
