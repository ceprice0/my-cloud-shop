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

<link rel="stylesheet" href="styles.css">

</head>

<body>

<!-- Navigation -->

<nav class="site-nav">
    <a class="brand" href="index.php">CLOUDCART</a>
    <div class="nav-links">
        <a href="products.php">Shop</a>
        <a href="register.php">Create account</a>
        <a href="cart.php">Cart</a>
        <a href="stats.php">Dashboard</a>
    </div>
</nav>

<!-- Header -->

<main class="page-shell">
<section class="hero-panel">
    <div class="hero-copy">
        <span class="eyebrow">Thoughtful tech, simply chosen</span>
        <h1>Good tools make better play.</h1>
        <p class="lede">A considered collection of gaming essentials for desks, setups, and the hours you actually want to spend there.</p>
        <div class="hero-actions">
            <a href="products.php" class="btn">Shop the collection</a>
            <a href="register.php" class="btn btn-secondary">Create an account</a>
        </div>
    </div>
    <div class="hero-note">
        <strong>03</strong>
        <span>carefully selected essentials in the current collection</span>
    </div>
</section>

<section>
    <div class="section-heading">
        <div>
            <span class="eyebrow">The edit</span>
            <h2>Made for your setup</h2>
        </div>
        <a class="back-link" href="products.php">View all products &rarr;</a>
    </div>

<div class="product-grid">

    <div class="product-card">
        <span class="product-mark">01 / precision</span>
        <h3>Gaming Mouse</h3>
        <p>RGB professional gaming mouse with programmable buttons.</p>
        <div class="price">£29.99</div>
    </div>

    <div class="product-card">
        <span class="product-mark">02 / tactile</span>
        <h3>Mechanical Keyboard</h3>
        <p>Premium mechanical keyboard with blue switches.</p>
        <div class="price">£79.99</div>
    </div>

    <div class="product-card">
        <span class="product-mark">03 / focus</span>
        <h3>Gaming Headset</h3>
        <p>7.1 surround sound gaming headset with microphone.</p>
        <div class="price">£49.99</div>
    </div>

</div>
</section>

</main>

<footer class="site-footer">CloudCart / DAT6007 Cloud Computing Deployment</footer>

</body>
</html>