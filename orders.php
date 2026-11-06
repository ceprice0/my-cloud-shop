<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CloudCart Order Tracking</title>

<style>

body{
font-family:Arial,sans-serif;
background:#f4f4f4;
padding:40px;
}

table{
width:100%;
background:white;
border-collapse:collapse;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

th,td{
padding:15px;
border:1px solid #ddd;
}

th{
background:#2563eb;
color:white;
}

h1{
margin-bottom:25px;
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
<span class="eyebrow">Your orders</span>
<h1>Order tracking</h1>
<p class="lede">A quiet view of what is on its way.</p>

<div class="table-wrap">
<table>

<tr>
<th>Order ID</th>
<th>Status</th>
<th>Date</th>
</tr>

<tr>
<td>1001</td>
<td>Pending</td>
<td>06/11/2026</td>
</tr>

<tr>
<td>1002</td>
<td>Dispatched</td>
<td>05/11/2026</td>
</tr>

<tr>
<td>1003</td>
<td>Delivered</td>
<td>03/11/2026</td>
</tr>

</table>
</div>
</main>

</body>
</html>