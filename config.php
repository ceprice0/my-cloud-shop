<?php

declare(strict_types=1);

function environment_value(string $name): ?string
{
    $value = getenv($name);

    if ($value !== false && $value !== '') {
        return $value;
    }

    foreach (array($_ENV, $_SERVER) as $environment) {
        if (isset($environment[$name]) && $environment[$name] !== '') {
            return (string) $environment[$name];
        }
    }

    return null;
}

function db_connect()
{
    if (!function_exists('sqlsrv_connect')) {
        throw new RuntimeException('The SQL Server PHP extension is not enabled.');
    }

    $serverName = environment_value('DB_SERVER');
    $database = environment_value('DB_NAME');
    $user = environment_value('DB_USER');
    $password = environment_value('DB_PASSWORD');

    if (!$serverName || !$database || !$user || !$password) {
        error_log('Database configuration values present: ' . json_encode(array(
            'DB_SERVER' => (bool) $serverName,
            'DB_NAME' => (bool) $database,
            'DB_USER' => (bool) $user,
            'DB_PASSWORD' => (bool) $password
        )));
        throw new RuntimeException('Database configuration is incomplete. Set DB_SERVER, DB_NAME, DB_USER, and DB_PASSWORD in the Azure App Service settings.');
    }

    $options = array(
        'Database' => $database,
        'Uid' => $user,
        'PWD' => $password,
        'Encrypt' => 1,
        'TrustServerCertificate' => 0
    );

    $connection = sqlsrv_connect($serverName, $options);

    if ($connection === false) {
        $errors = sqlsrv_errors();
        error_log('SQL Server connection failed: ' . json_encode($errors ?: array()));
        throw new RuntimeException('Unable to connect to the database.');
    }

    return $connection;
}

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
