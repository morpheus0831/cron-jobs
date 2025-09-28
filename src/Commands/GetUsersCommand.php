<?php

declare(strict_types=1);

namespace CronMh\Commands;

use CronMh\Repository\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:get-users',
    description: 'Fetch and display all users from the database'
)]
class GetUsersCommand extends Command
{
    public function __invoke(OutputInterface $output): void
    {
        $users = new UserRepository();
        $users->getUsers();
        $output->writeln('Users fetched successfully.');
    }
}
