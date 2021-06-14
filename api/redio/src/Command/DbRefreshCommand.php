<?php

namespace App\Command;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class DbRefreshCommand extends Command
{
    protected static $defaultName = 'db:refresh';
    protected static $defaultDescription = 'Add a short description for your command';

    protected function configure()
    {
        $this->setDescription(self::$defaultDescription);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        try {
            echo shell_exec('symfony console doctrine:schema:drop --env=local --force');
            echo shell_exec('symfony console doctrine:schema:create --env=local');
            echo shell_exec('symfony console doctrine:fixtures:load -n');
        } catch (Exception $e) {
            $io->error('Something went wrong!');
        }

        $io->success('Database has been refreshed.');

        return Command::SUCCESS;
    }
}
