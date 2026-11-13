<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';

function start_user_session(bool $remember = false): void
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        if ($remember && isset($_COOKIE[session_name()])) {
            $params = session_get_cookie_params();
            setcookie(session_name(), session_id(), array(
                'expires' => time() + 60 * 60 * 24 * 30,
                'path' => $params['path'],
                'secure' => $params['secure'],
                'httponly' => $params['httponly'],
                'samesite' => $params['samesite'] ?? 'Lax'
            ));
        }
        return;
    }

    $lifetime = $remember ? 60 * 60 * 24 * 30 : 0;
    session_set_cookie_params(array(
        'lifetime' => $lifetime,
        'path' => '/',
        'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        'httponly' => true,
        'samesite' => 'Lax'
    ));
    session_start();
}

function signed_in_user(): ?array
{
    start_user_session();

    if (!isset($_SESSION['user'])) {
        return null;
    }

    return $_SESSION['user'];
}

function require_signed_in(): array
{
    $user = signed_in_user();

    if ($user === null) {
        header('Location: signin.php');
        exit();
    }

    return $user;
}
