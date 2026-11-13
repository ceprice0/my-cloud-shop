<?php

require_once __DIR__ . '/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: signin.php');
    exit();
}

$email = strtolower(trim($_POST['email'] ?? ''));
$password = $_POST['password'] ?? '';
$remember = isset($_POST['remember']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password === '') {
    header('Location: signin.php?error=' . urlencode('Enter a valid email address and password.'));
    exit();
}

try {
    $conn = db_connect();
    $stmt = sqlsrv_query($conn, 'SELECT id, name, email, password FROM shopusers WHERE email = ?', array($email));

    if ($stmt === false) {
        error_log('Login query failed: ' . json_encode(sqlsrv_errors() ?: array()));
        throw new RuntimeException('Login query failed.');
    }

    $account = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    sqlsrv_close($conn);

    if (!$account || !password_verify($password, (string) $account['password'])) {
        header('Location: signin.php?error=' . urlencode('Email or password is incorrect.'));
        exit();
    }

    start_user_session($remember);
    session_regenerate_id(true);
    $_SESSION['user'] = array(
        'id' => (int) $account['id'],
        'name' => (string) $account['name'],
        'email' => (string) $account['email']
    );

    header('Location: index.php');
    exit();
} catch (Throwable $exception) {
    error_log('Login failed: ' . $exception->getMessage());
    header('Location: signin.php?error=' . urlencode('Sign in is temporarily unavailable. Please try again.'));
    exit();
}
