<?php

declare(strict_types=1);

namespace CronMh\Database;

use PDO;
use Exception;
use PDOException;
use CronMh\Config\Config;

class DB
{
    public static function connect()
    {
        try {
            Config::load(__DIR__ . "/../Config/appConfig.php");
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

        $user = Config::get('db.user');
        $password = Config::get('db.pass');
        $dsn = Config::get('db.dsn');

        try {
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_FETCH_CATALOG_NAMES, PDO::FETCH_OBJ);

            return $pdo;
        } catch (PDOException $e) {
            throw new PDOException('Database connection failed: ' . $e->getMessage());
        }
    }
}
