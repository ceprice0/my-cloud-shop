<?php

$serverName = "tcp:an-sql-server1.database.windows.net,1433";

$connectionOptions = array(
    "Database" => "calumsdatabase",
    "Uid" => "AdminAN",
    "PWD" => ""
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

<title>CloudCart Analytics Dashboard</title>

<style>

body{
    font-family:Arial,sans-serif;
    background:linear-gradient(135deg,#0f172a,#1e293b);
    color:white;
    text-align:center;
    padding-top:80px;
    min-height:100vh;
    margin:0;
}

.card{
    background:#1e293b;
    width:550px;
    margin:auto;
    padding:40px;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

.number{
    font-size:70px;
    color:#38bdf8;
    font-weight:bold;
}

h1{
    margin-bottom:20px;
}

h3{
    color:#38bdf8;
    margin-top:25px;
}

p{
    font-size:18px;
}

.metric{
    background:#334155;
    margin:10px auto;
    padding:12px;
    border-radius:8px;
}

.btn{
    display:inline-block;
    margin-top:20px;
    background:#2563eb;
    color:white;
    padding:12px 25px;
    text-decoration:none;
    border-radius:8px;
    font-weight:bold;
}

.btn:hover{
    background:#1d4ed8;
}

</style>

</head>

<body>

<div class="card">

    <h1>📊 CloudCart Analytics Dashboard</h1>

    <p>Total Registered Customers</p>

    <div class="number">
        <?php echo $totalUsers; ?>
    </div>

    <hr style="margin:30px 0;">

    <h3>Store Metrics</h3>

    <div class="metric">
        🛍 Products Available: 5
    </div>

    <div class="metric">
        📦 Orders Processed: 2
    </div>

    <div class="metric">
        ☁ Platform: Microsoft Azure
    </div>

    <div class="metric">
        🗄 Database: Azure SQL Database
    </div>

    <div class="metric">
        🚀 Deployment: GitHub → Azure App Service
    </div>

    <a href="index.php" class="btn">
        Back Home
    </a>

</div>

</body>
</html>
``