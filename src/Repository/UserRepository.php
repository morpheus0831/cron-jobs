<?php

declare(strict_types=1);

namespace CronMh\Repository;

use CronMh\Database\DB;

class UserRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = DB::connect();
    }

    public function getUsers()
    {
        $stmt = $this->connection->prepare('SELECT * FROM users');
        $stmt->execute();
        $rows = $stmt->fetchAll();

        foreach ($rows as $row) {
            echo $row['id'] . ' - ' . $row['name'] . PHP_EOL;
        }
    }
}
