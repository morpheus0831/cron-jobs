<?php

declare(strict_types=1);

namespace CronMh\Commands;

use CronMh\Service\MailerService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:send-email',
    description: 'Sends email'
)]
class SendEmailCommand extends Command
{
    public function __invoke(OutputInterface $output): void
    {
        $mailer = new MailerService();
        $mailer->sendEmail('arnold.yancha@medhealth.com.au', 'Test Email', 'This is a test email sent from the CronMh application.');
        $output->writeln('Mail sent successfully.');
    }
}