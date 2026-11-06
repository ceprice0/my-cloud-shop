<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Account Created</title>

<style>

body{
font-family:Arial;
background:linear-gradient(135deg,#667eea,#764ba2);
display:flex;
justify-content:center;
align-items:center;
height:100vh;
margin:0;
}

.card{
background:white;
padding:40px;
border-radius:15px;
text-align:center;
width:550px;
}

.icon{
font-size:80px;
}

.btn{
display:inline-block;
padding:12px 25px;
margin:10px;
color:white;
text-decoration:none;
border-radius:8px;
font-weight:bold;
}

.home{background:#007bff;}
.products{background:#28a745;}
.dashboard{background:#ff9800;}

</style>

<link rel="stylesheet" href="styles.css">

</head>

<body>

<nav class="site-nav">
	<a class="brand" href="index.php">CLOUDCART</a>
	<div class="nav-links">
		<a href="products.php">Shop</a>
		<a href="cart.php">Cart</a>
		<a href="stats.php">Dashboard</a>
	</div>
</nav>

<main class="page-shell">
<div class="surface status-card">

<div class="check">&#10003;</div>

<span class="eyebrow">All set</span>
<h1>Welcome to CloudCart</h1>

<p>
Customer account created successfully.
Your information has been securely stored
in Azure SQL Database.
</p>

<div class="actions">
<a href="index.php" class="btn btn-secondary">
Home
</a>

<a href="products.php" class="btn">
Browse Products
</a>
</div>

</div>
</main>

</body>
</html>