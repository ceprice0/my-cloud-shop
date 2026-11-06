<?php

$serverName = "tcp:an-sql-server1.database.windows.net,1433";

$connectionOptions = array(
    "Database" => "calumsdatabase",
    "Uid" => "AdminAN",
    "PWD" => "",
    "Encrypt" => 1,
    "TrustServerCertificate" => 0
);

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: register.php");
    exit();
}

$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$password = $_POST["password"];

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

$conn = sqlsrv_connect($serverName, $connectionOptions);

if(!$conn)
{
    die("Database Connection Failed");
}

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

if($stmt)
{
    sqlsrv_close($conn);

    header("Location: success.php");
    exit();
}
else
{
    die("Registration Failed");
}

?>