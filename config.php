<?php

declare(strict_types=1);

function db_connect()
{
    if (!function_exists('sqlsrv_connect')) {
        throw new RuntimeException('The SQL Server PHP extension is not enabled.');
    }

    $serverName = getenv('DB_SERVER') ?: 'tcp:an-sql-server1.database.windows.net,1433';
    $options = array(
        'Database' => getenv('DB_NAME') ?: 'calumsdatabase',
        'Uid' => getenv('DB_USER') ?: 'AdminAN',
        'PWD' => getenv('DB_PASSWORD') ?: '',
        'Encrypt' => 1,
        'TrustServerCertificate' => 0
    );

    $connection = sqlsrv_connect($serverName, $options);

    if ($connection === false) {
        throw new RuntimeException('Unable to connect to the database.');
    }

    return $connection;
}

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
