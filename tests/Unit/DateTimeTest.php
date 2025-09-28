<?php

declare(strict_types=1);

namespace CronMh\Tests\Unit;

use CronMh\Helpers\DateHelper;
use PHPUnit\Framework\TestCase;

class DateTimeTest extends TestCase
{
    private DateHelper $dateHelper;

    protected function setUp(): void
    {
        $this->dateHelper = new DateHelper();
    }

    public function testValidDate(): void
    {
        $this->assertTrue($this->dateHelper->isDateValid('2023-10-05 14:30:00'));
        $this->assertTrue($this->dateHelper->isDateValid('2023-02-28 23:59:59'));
    }

    public function testInvalidDate(): void
    {
        $this->assertFalse($this->dateHelper->isDateValid('2023-02-30 14:30:00')); // Invalid date
        $this->assertFalse($this->dateHelper->isDateValid('2023-10-05 24:00:00')); // Invalid time
        $this->assertFalse($this->dateHelper->isDateValid('invalid-date-string'));
        $this->assertFalse($this->dateHelper->isDateValid('0000-00-00', 'Y-m-d')); // Invalid date
        $this->assertFalse($this->dateHelper->isDateValid('2025-13-01', 'Y-m-d')); // Invalid date
    }

    public function testDifferentFormat(): void
    {
        $this->assertTrue($this->dateHelper->isDateValid('05/10/2023 14:30', 'd/m/Y H:i'));
        $this->assertFalse($this->dateHelper->isDateValid('2023-10-05', 'd/m/Y'));
    }

    public function testInvalidTime()
    {
        $this->assertFalse($this->dateHelper->isDateValid('25:00'), 'H:i'); // Invalid hour
        $this->assertFalse($this->dateHelper->isDateValid('23:70', 'H:i'), 'H:i'); // Invalid minute
    }
}
