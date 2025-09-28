# Cron Jobs Framework

This is a framework for creating cron jobs. It uses Symfony Console to create commands and run them as cron jobs.

## Creating a new command

To create a new command, create a new class in the `src/Commands` directory.

Refer to https://symfony.com/doc/current/console.html for more information on Symfony Console.

## Registering the command

To register the command, add it to the `$commands` array in the `console` file in the project root directory.

## Running the command

Run the `php console <command name>` to run the command.

## Running the tests

Run `vendor/bin/phpunit <path to test file>` to run the tests.

## Configuration of database connection

Create a `.env` file in the project root directory and add the following variables:

```
DBUSER=dbuser
DBPASS=dbpass
DBHOST=dbhost
DBNAME=dbname
DBDSN=mysql:host=${DBHOST};port=3306;dbname=${DBNAME};charset=utf8mb4;collation=utf8mb4_unicode_ci
```

A template file `.env.dist` is provided in the project root directory. Copy this file to `.env` and replace the values with your own database connection details.
