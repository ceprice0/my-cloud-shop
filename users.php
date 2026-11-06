<?php

require_once __DIR__ . '/config.php';

$users = array();
$error = null;

try {
    $conn = db_connect();
    $stmt = sqlsrv_query($conn, 'SELECT id, name, email, created_at FROM shopusers ORDER BY id DESC');

    if ($stmt === false) {
        throw new RuntimeException('Customer query failed.');
    }

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $users[] = $row;
    }

    sqlsrv_close($conn);
} catch (Throwable $exception) {
    $error = 'Customer records are temporarily unavailable. Please try again later.';
}

?>

<!DOCTYPE html>
<html>

<head>

<title>CloudCart Customer Management</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#f4f6f9;
    padding:40px;
}

.header{
    background:#2563eb;
    color:white;
    padding:25px;
    border-radius:12px;
    text-align:center;
    margin-bottom:30px;
}

.header h1{
    margin-bottom:10px;
}

.container{
    max-width:1200px;
    margin:auto;
}

.info-card{
    background:white;
    padding:20px;
    border-radius:12px;
    margin-bottom:20px;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

table{
    width:100%;
    background:white;
    border-collapse:collapse;
    border-radius:12px;
    overflow:hidden;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

th{
    background:#2563eb;
    color:white;
    padding:15px;
}

td{
    padding:15px;
    border-bottom:1px solid #eee;
}

tr:hover{
    background:#f8fafc;
}

.btn{
    display:inline-block;
    text-decoration:none;
    background:#2563eb;
    color:white;
    padding:12px 20px;
    border-radius:8px;
    margin-top:20px;
    margin-right:10px;
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
        <a href="stats.php">Dashboard</a>
    </div>
</nav>

<main class="page-shell">
    <span class="eyebrow">Admin view</span>
    <h1>Customer accounts</h1>
    <p class="lede">Registered customers held in the CloudCart database.</p>

    <?php if ($error): ?>
        <div class="message" role="alert">
            <?php echo e($error); ?>
        </div>
    <?php else: ?>
    <div class="table-wrap">
    <table>

        <tr>
            <th>Customer ID</th>
            <th>Full Name</th>
            <th>Email Address</th>
            <th>Registration Date</th>
        </tr>

        <?php if (!$users): ?>
            <tr>
                <td colspan="4">No customer accounts have been registered yet.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($users as $row): ?>
                <tr>
                    <td><?php echo (int) $row['id']; ?></td>
                    <td><?php echo e($row['name']); ?></td>
                    <td><?php echo e($row['email']); ?></td>
                    <td><?php echo e($row['created_at'] instanceof DateTimeInterface ? $row['created_at']->format('Y-m-d H:i:s') : $row['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </table>
    </div>
    <?php endif; ?>

    <a href="index.php" class="back-link">&larr; Back to home</a>
</main>

</body>

</html>