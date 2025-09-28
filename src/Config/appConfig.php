<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../../", ['.env','.env.local']);
$dotenv->load();

return [
    'db' => [
        'host' => $_ENV['DBHOST'],
        'user' => $_ENV['DBUSER'],
        'pass' => $_ENV['DBPASS'],
        'dsn' => $_ENV['DBDSN'],
    ]
];
