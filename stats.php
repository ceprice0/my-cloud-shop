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

<link rel="stylesheet" href="styles.css">

</head>

<body>

<nav class="site-nav">
    <a class="brand" href="index.php">CLOUDCART</a>
    <div class="nav-links">
        <a href="products.php">Shop</a>
        <a href="register.php">Create account</a>
        <a href="cart.php">Cart</a>
        <a href="users.php">Customers</a>
    </div>
</nav>

<main class="page-shell dashboard">
<div class="surface">
    <span class="eyebrow">Admin view</span>
    <h1>Store overview</h1>

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

    <div class="metrics">
    <div class="metric">
        <strong>Products available: 5</strong>
        <span>Current catalogue items</span>
    </div>

    <div class="metric">
        <strong>Orders processed: 3</strong>
        <span>Sample order activity</span>
    </div>

    <div class="metric">
        <strong>Registered customers: <?php echo $error ? 'Unavailable' : $totalUsers; ?></strong>
        <span>Live database count</span>
    </div>

    <div class="metric">
        <strong>Platform</strong>
        <span>Microsoft Azure App Service</span>
    </div>

    <div class="metric">
        <strong>Database</strong>
        <span>Azure SQL Database</span>
    </div>

    <div class="metric">
        <strong>Deployment</strong>
        <span>GitHub Actions CI/CD</span>
    </div>
    </div>

    <a href="index.php" class="btn">Back home</a>

</div>
</main>

</body>
</html>
``