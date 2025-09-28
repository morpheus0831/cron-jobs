<?php

declare(strict_types=1);

namespace CronMh\Tests\Unit;

use PDO;
use CronMh\Database\DB;
use PHPUnit\Framework\TestCase;

class DBTest extends TestCase
{
    public function testConnection(): void
    {
        $pdo = DB::connect();
        $this->assertInstanceOf(PDO::class, $pdo);
    }
}
