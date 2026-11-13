<?php

declare(strict_types=1);

function db_connect()
{
    if (!function_exists('sqlsrv_connect')) {
        throw new RuntimeException('The SQL Server PHP extension is not enabled.');
    }

    $serverName = getenv('DB_SERVER');
    $database = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $password = getenv('DB_PASSWORD');

    if (!$serverName || !$database || !$user || $password === false || $password === '') {
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
