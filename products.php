<?php

$serverName = "tcp:an-sql-server1.database.windows.net,1433";

$connectionOptions = array(
    "Database" => "calumsdatabase",
    "Uid" => "AdminAN",
    "PWD" => "",
    "Encrypt" => 1,
    "TrustServerCertificate" => 0
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

$sql = "SELECT * FROM Products";

$stmt = sqlsrv_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>Products - CloudCart</title>

<style>

body{
font-family:Arial;
background:#f4f6f9;
margin:0;
}

.header{
background:#1e293b;
color:white;
padding:20px;
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
padding:20px;
border-radius:12px;
box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

.price{
font-size:28px;
color:#2563eb;
font-weight:bold;
}

.stock{
color:green;
margin-top:10px;
}

</style>

</head>

<body>

<div class="header">
<h1>CloudCart Products</h1>
</div>

<div class="products">

<?php

while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
{
?>

<div class="card">

<h2><?php echo $row['ProductName']; ?></h2>

<p><?php echo $row['Description']; ?></p>

<div class="price">
£<?php echo $row['Price']; ?>
</div>

<div class="stock">
Stock: <?php echo $row['Stock']; ?>
</div>

</div>

<?php
}
?>

</div>

</body>
</html>