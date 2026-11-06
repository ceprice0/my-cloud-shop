<?php

require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: register.php");
    exit();
}

$name = trim($_POST["name"] ?? '');
$email = trim($_POST["email"] ?? '');
$password = $_POST["password"] ?? '';

if(empty($name) || empty($email) || empty($password))
{
    die("All fields are required.");
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    die("Invalid email address.");
}

if(strlen($password) < 8)
{
    die("Password must be at least 8 characters.");
}

try {

    $conn = db_connect();

    $hashedPassword = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    $sql = "INSERT INTO shopusers (name, email, password)
            VALUES (?, ?, ?)";

    $params = array(
        $name,
        strtolower($email),
        $hashedPassword
    );

    $stmt = sqlsrv_query(
        $conn,
        $sql,
        $params
    );

    if($stmt === false)
    {
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_close($conn);

    header("Location: success.php");
    exit();

}
catch(Exception $e)
{
    die($e->getMessage());
}

?>