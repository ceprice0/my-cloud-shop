<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CloudCart | Scalable Cloud E-Commerce Platform</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:white;
    min-height:100vh;
}

/* Navigation */

.navbar{
    background:rgba(0,0,0,0.25);
    padding:20px;
    text-align:center;
    backdrop-filter:blur(10px);
}

.navbar a{
    color:white;
    text-decoration:none;
    margin:0 20px;
    font-weight:bold;
    font-size:16px;
    transition:0.3s;
}

.navbar a:hover{
    color:#ffd700;
}

/* Header */

.header{
    text-align:center;
    padding:50px 20px 20px;
}

.header h1{
    font-size:70px;
    margin-bottom:15px;
}

.header p{
    font-size:24px;
    opacity:0.95;
}

/* Hero */

.hero{
    text-align:center;
    padding:50px 20px;
}

.hero h2{
    font-size:48px;
    margin-bottom:20px;
}

.hero p{
    font-size:20px;
    max-width:850px;
    margin:auto;
    line-height:1.8;
}

/* Buttons */

.buttons{
    margin-top:40px;
}

.btn{
    display:inline-block;
    padding:16px 32px;
    margin:10px;
    border-radius:10px;
    text-decoration:none;
    color:white;
    font-weight:bold;
    font-size:18px;
    transition:0.3s;
}

.btn-products{
    background:#007bff;
}

.btn-products:hover{
    background:#0056b3;
}

.btn-register{
    background:#28a745;
}

.btn-register:hover{
    background:#1e7e34;
}

.btn-cart{
    background:#ff9800;
}

.btn-cart:hover{
    background:#e68900;
}

.btn-dashboard{
    background:#6f42c1;
}

.btn-dashboard:hover{
    background:#563d7c;
}

/* Product Cards */

.products{
    display:flex;
    justify-content:center;
    gap:25px;
    flex-wrap:wrap;
    padding:40px 20px;
}

.card{
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(10px);
    width:320px;
    border-radius:15px;
    padding:30px;
    text-align:center;
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

.card h3{
    margin-bottom:15px;
    font-size:24px;
}

.price{
    font-size:28px;
    font-weight:bold;
    color:#ffd700;
    margin-top:15px;
}

/* Features */

.features{
    max-width:900px;
    margin:50px auto;
    background:rgba(255,255,255,0.12);
    padding:40px;
    border-radius:15px;
    text-align:center;
}

.features h2{
    margin-bottom:25px;
}

.features p{
    font-size:20px;
    line-height:2;
}

/* Footer */

.footer{
    text-align:center;
    padding:40px 20px;
    opacity:0.9;
}

</style>

</head>

<body>

<!-- Navigation -->

<nav class="navbar">
    <a href="index.php">Home</a>
    <a href="products.php">Products</a>
    <a href="register.php">Register</a>
    <a href="cart.php">Cart</a>
    <a href="stats.php">Dashboard</a>
</nav>

<!-- Header -->

<div class="header">
    <h1>🛒 CloudCart</h1>
    <p>Scalable Cloud E-Commerce Platform</p>
</div>

<!-- Hero -->

<div class="hero">

    <h2>Welcome to CloudCart</h2>

    <p>
        CloudCart is a cloud-hosted e-commerce platform deployed on
        Microsoft Azure App Service and integrated with Azure SQL Database.
        Customers can browse products, create accounts, manage shopping carts
        and track orders through a scalable cloud architecture.
    </p>

    <div class="buttons">

        <a href="products.php" class="btn btn-products">
            Browse Products
        </a>

        <a href="register.php" class="btn btn-register">
            Register
        </a>

        <a href="cart.php" class="btn btn-cart">
            Shopping Cart
        </a>

        <a href="stats.php" class="btn btn-dashboard">
            Dashboard
        </a>

    </div>

</div>

<!-- Featured Products -->

<div class="products">

    <div class="card">
        <h3>🎮 Gaming Mouse</h3>
        <p>RGB professional gaming mouse with programmable buttons.</p>
        <div class="price">£29.99</div>
    </div>

    <div class="card">
        <h3>⌨️ Mechanical Keyboard</h3>
        <p>Premium mechanical keyboard with blue switches.</p>
        <div class="price">£79.99</div>
    </div>

    <div class="card">
        <h3>🎧 Gaming Headset</h3>
        <p>7.1 surround sound gaming headset with microphone.</p>
        <div class="price">£49.99</div>
    </div>

</div>

<!-- Features -->

<div class="features">

    <h2>Why Choose CloudCart?</h2>

    <p>
        ✅ Azure App Service Hosting<br>
        ✅ Azure SQL Database Integration<br>
        ✅ Secure User Registration<br>
        ✅ Product Catalogue Management<br>
        ✅ Shopping Cart Functionality<br>
        ✅ Order Tracking Capabilities<br>
        ✅ Cloud Scalability & Reliability
    </p>

</div>

<!-- Footer -->

<div class="footer">
    <p>
        Developed by Calum Price | DAT6007 Cloud Computing Deployment
    </p>
</div>

</body>
</html>