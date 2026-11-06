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
}

.navbar{
    background:#1e293b;
    padding:15px;
    text-align:center;
}

.navbar a{
    color:white;
    text-decoration:none;
    margin:0 20px;
    font-weight:bold;
}

.header{
    background:#2563eb;
    color:white;
    text-align:center;
    padding:40px;
}

.products{
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap:25px;
    padding:40px;
}

.card{
    width:300px;
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    text-align:center;
}

.card h2{
    margin-bottom:15px;
}

.price{
    font-size:30px;
    color:#2563eb;
    font-weight:bold;
    margin:15px 0;
}

.btn{
    display:inline-block;
    margin-top:10px;
    padding:12px 20px;
    background:#28a745;
    color:white;
    text-decoration:none;
    border-radius:8px;
}

.btn:hover{
    background:#218838;
}

</style>
</head>

<body>

<nav class="navbar">
    <a href="index.php">Home</a>
    <a href="products.php">Products</a>
    <a href="register.php">Register</a>
    <a href="cart.php">Cart</a>
    <a href="orders.php">Orders</a>
    <a href="stats.php">Dashboard</a>
</nav>

<div class="header">
    <h1>🛍️ CloudCart Product Catalogue</h1>
    <p>Browse our featured products</p>
</div>

<div class="products">

    <div class="card">
        <h2>🎮 Gaming Mouse</h2>
        <p>RGB Gaming Mouse with programmable buttons.</p>
        <div class="price">£29.99</div>
        <a href="cart.php" class="btn">Add To Cart</a>
    </div>

    <div class="card">
        <h2>⌨️ Mechanical Keyboard</h2>
        <p>Premium mechanical keyboard with blue switches.</p>
        <div class="price">£79.99</div>
        <a href="cart.php" class="btn">Add To Cart</a>
    </div>

    <div class="card">
        <h2>🎧 Gaming Headset</h2>
        <p>7.1 surround sound headset with microphone.</p>
        <div class="price">£49.99</div>
        <a href="cart.php" class="btn">Add To Cart</a>
    </div>

    <div class="card">
        <h2>📷 HD Webcam</h2>
        <p>1080p webcam perfect for streaming and meetings.</p>
        <div class="price">£39.99</div>
        <a href="cart.php" class="btn">Add To Cart</a>
    </div>

    <div class="card">
        <h2>💺 Gaming Chair</h2>
        <p>Ergonomic gaming chair for comfort and support.</p>
        <div class="price">£199.99</div>
        <a href="cart.php" class="btn">Add To Cart</a>
    </div>

</div>

</body>
</html>