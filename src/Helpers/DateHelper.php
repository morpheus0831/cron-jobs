<?php

declare(strict_types=1);

namespace CronMh\Helpers;

use DateTime;

class DateHelper
{
    public function isDateValid(string $dateSting, string $format = 'Y-m-d H:i:s'): bool
    {
        $dateTime = DateTime::createFromFormat($format, $dateSting);
        return $dateTime && $dateTime->format($format) === $dateSting;
    }
}
