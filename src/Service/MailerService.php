<?php

declare(strict_types=1);

namespace CronMh\Service;

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;
use CronMh\Config\Config;
use Exception;

class MailerService
{
    private string $from;
    private string $dsn;

    public function __construct()
    {
        try {
            Config::load();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

        $this->from = Config::get('mailer.from');
        $this->dsn = Config::get('mailer.dsn');
    }

    public function sendEmail(string $to, string $subject, string $body): void
    {
        $email = (new Email())
            ->from($this->from)
            ->to($to)
            ->subject($subject)
            ->text($body);

        $transport = Transport::fromDsn($this->dsn);
        $mailer = new Mailer($transport);
        $mailer->send($email);
    }

}