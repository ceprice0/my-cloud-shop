<?php

require_once __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit();
}

$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$password = (string) ($_POST['password'] ?? '');
$errors = array();

if ($name === '' || strlen($name) > 100) {
    $errors[] = 'Please enter a name of 1 to 100 characters.';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 255) {
    $errors[] = 'Please enter a valid email address.';
}

if (strlen($password) < 8) {
    $errors[] = 'Your password must be at least 8 characters long.';
}

if ($errors) {
    http_response_code(422);
    echo '<!doctype html><html lang="en"><head><meta charset="UTF-8"><title>Registration error</title></head><body>';
    echo '<h1>Registration could not be completed</h1><ul>';
    foreach ($errors as $error) {
        echo '<li>' . e($error) . '</li>';
    }
    echo '</ul><a href="register.php">Return to registration</a></body></html>';
    exit();
}

try {
    $conn = db_connect();
    $sql = 'INSERT INTO shopusers (name, email, password) VALUES (?, ?, ?)';
    $params = array($name, strtolower($email), password_hash($password, PASSWORD_DEFAULT));

    if (sqlsrv_query($conn, $sql, $params) === false) {
        throw new RuntimeException('Registration insert failed.');
    }

    sqlsrv_close($conn);
    header('Location: success.php');
    exit();
} catch (Throwable $exception) {
    http_response_code(500);
    echo '<!doctype html><html lang="en"><head><meta charset="UTF-8"><title>Registration unavailable</title></head><body>';
    echo '<h1>Registration is temporarily unavailable</h1>';
    echo '<p>Please try again later.</p><a href="register.php">Return to registration</a></body></html>';
}