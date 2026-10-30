<?php

$serverName = "tcp:an-sql-server1.database.windows.net,1433";

$connectionOptions = array(
    "Database" => "calumsdatabase",
    "Uid" => "AdminAN",
    "PWD" => "Taily1047*",
    "Encrypt" => 1,
    "TrustServerCertificate" => 0
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if ($conn) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO shopusers (name,email,password)
                VALUES (?,?,?)";

        $params = array($name, $email, $hashedPassword);

        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt) {
            header("Location: success.php");
            exit();
        }

        echo "Database Insert Failed";
    }

    else {
        echo "Database Connection Failed";
    }
}
?>