<?php

require_once __DIR__ . '/config.php';

$totalUsers = 0;
$error = null;

try {
    $conn = db_connect();
    $stmt = sqlsrv_query($conn, 'SELECT COUNT(*) AS totalusers FROM shopusers');

    if ($stmt === false) {
        throw new RuntimeException('Customer count query failed.');
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    $totalUsers = (int) ($row['totalusers'] ?? 0);
    sqlsrv_close($conn);
} catch (Throwable $exception) {
    $error = 'Analytics are temporarily unavailable. Please try again later.';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CloudCart Analytics Dashboard</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:linear-gradient(135deg,#0f172a,#1e293b);
    color:white;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.card{
    background:#1e293b;
    width:650px;
    padding:40px;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    text-align:center;
}

h1{
    margin-bottom:20px;
}

.number{
    font-size:80px;
    color:#38bdf8;
    font-weight:bold;
    margin:20px 0;
}

.metric{
    background:#334155;
    padding:15px;
    border-radius:10px;
    margin:10px 0;
    font-size:18px;
}

.btn{
    display:inline-block;
    margin-top:25px;
    padding:12px 25px;
    background:#2563eb;
    color:white;
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

    <?php if ($error): ?>
        <div class="metric" role="alert">
            <?php echo e($error); ?>
        </div>
    <?php endif; ?>

    <div class="number">
        <?php echo $error ? '—' : $totalUsers; ?>
    </div>

    <hr style="margin:25px 0;">

    <div class="metric">
        🛍 Products Available: 5
    </div>

    <div class="metric">
        📦 Orders Processed: 3
    </div>

    <div class="metric">
        👥 Registered Customers: <?php echo $error ? 'Unavailable' : $totalUsers; ?>
    </div>

    <div class="metric">
        ☁ Platform: Microsoft Azure App Service
    </div>

    <div class="metric">
        🗄 Database: Azure SQL Database
    </div>

    <div class="metric">
        🚀 Deployment: GitHub Actions CI/CD
    </div>

    <a href="index.php" class="btn">
        🏠 Back Home
    </a>

</div>

</body>
</html>
``