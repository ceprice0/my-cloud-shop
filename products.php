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

</style>

</head>

<body>

<div class="header">

<h1>🛒 CloudCart Product Catalogue</h1>

</div>

<div class="products">

<?php

while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
{
?>

<div class="card">

<h2>
<?php echo $row['ProductName']; ?>
</h2>

<div class="price">
£<?php echo $row['Price']; ?>
</div>

<div class="stock">
Stock:
<?php echo $row['StockQuantity']; ?>
</div>

</div>

<?php
}
?>

</div>

</body>

</html>