<?php

require_once __DIR__ . '/config.php';

$products = array();
$error = null;

try {
    $conn = db_connect();
    $stmt = sqlsrv_query($conn, 'SELECT ProductName, Price, StockQuantity FROM Products ORDER BY ProductName');

    if ($stmt === false) {
        throw new RuntimeException('Product query failed.');
    }

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $products[] = $row;
    }
    sqlsrv_close($conn);
} catch (Throwable $exception) {
    $error = 'Products are temporarily unavailable. Please try again later.';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CloudCart Product Catalogue</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#f4f6f9;
color:#172033;
margin:0;
}

.header{
background:#2563eb;
color:white;
padding:30px;
text-align:center;
}

.products{
display:flex;
flex-wrap:wrap;
justify-content:center;
gap:20px;
padding:40px;
}

.card{
background:white;
width:300px;
padding:25px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
text-align:center;
}

.price{
font-size:30px;
font-weight:bold;
color:#2563eb;
margin-top:15px;
}

.stock{
margin-top:10px;
color:green;
font-weight:bold;
}

.message{
    max-width:700px;
    margin:40px auto;
    padding:20px;
    background:white;
    text-align:center;
}

.back{
    display:block;
    margin:20px auto;
    text-align:center;
    color:#2563eb;
}

</style>

</head>

<body>

<div class="header">

<h1>🛒 CloudCart Product Catalogue</h1>

</div>

<div class="products">

<?php if ($error): ?>
<p class="message"><?php echo e($error); ?></p>
<?php elseif (!$products): ?>
<p class="message">No products are available right now.</p>
<?php else: ?>
<?php foreach ($products as $row): ?>

<div class="card">

<h2>
<?php echo e($row['ProductName']); ?>
</h2>

<div class="price">
£<?php echo number_format((float) $row['Price'], 2); ?>
</div>

<div class="stock">
Stock:
<?php echo (int) $row['StockQuantity']; ?>
</div>

</div>

<?php endforeach; ?>
<?php endif; ?>

</div>

<a class="back" href="index.php">Back to home</a>

</body>

</html>