<?php

$serverName = "tcp:an-sql-server1.database.windows.net,1433";

$connectionOptions = array(
    "Database" => "calumsdatabase",
    "Uid" => "AdminAN",
    "PWD" => "Taily1047*"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

$sql = "SELECT COUNT(*) AS totalusers FROM shopusers";

$stmt = sqlsrv_query($conn, $sql);

$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

$totalUsers = $row['totalusers'];

?>

<!DOCTYPE html>
<html>
<head>

<title>MyShop Statistics</title>

<style>

body{
font-family:Arial;
background:#0f172a;
color:white;
text-align:center;
padding-top:100px;
}

.card{
background:#1e293b;
width:400px;
margin:auto;
padding:30px;
border-radius:15px;
}

.number{
font-size:60px;
color:#38bdf8;
font-weight:bold;
}

</style>

</head>

<body>

<div class="card">

<h1>MyShop Dashboard</h1>

<p>Total Registered Users</p>

<div class="number">
<?php echo $totalUsers; ?>
</div>

<br>

<a href="index.php" style="color:white;">
Back Home
</a>

</div>

</body>

</html>