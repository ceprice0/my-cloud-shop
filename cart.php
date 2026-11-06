<?php

require_once __DIR__ . '/config.php';
session_start();

if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array(
		'mouse' => array('name' => 'Gaming Mouse', 'price' => 29.99, 'quantity' => 1),
		'keyboard' => array('name' => 'Mechanical Keyboard', 'price' => 79.99, 'quantity' => 1)
	);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'remove') {
	$itemId = (string) ($_POST['item_id'] ?? '');

	if (isset($_SESSION['cart'][$itemId])) {
		unset($_SESSION['cart'][$itemId]);
	}

	header('Location: cart.php');
	exit();
}

$cart = $_SESSION['cart'];
$total = 0.0;

foreach ($cart as $item) {
	$total += (float) $item['price'] * (int) $item['quantity'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CloudCart Shopping Cart</title>

<style>

body{
font-family:Arial,sans-serif;
background:#f4f4f4;
padding:50px;
}

.card{
background:white;
max-width:700px;
margin:auto;
padding:40px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

h1{
margin-bottom:25px;
}

.total{
font-size:32px;
font-weight:bold;
color:#2563eb;
margin-top:20px;
}

.btn{
display:inline-block;
padding:12px 20px;
background:#28a745;
color:white;
text-decoration:none;
border-radius:8px;
margin-top:20px;
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
		<a href="stats.php">Dashboard</a>
	</div>
</nav>

<main class="page-shell narrow-shell">
<div class="surface">
<span class="eyebrow">Your selection</span>
<h1>Your cart</h1>
<p>Two considered additions for your desk.</p>

<div class="cart-lines">
	<?php if (!$cart): ?>
		<p class="message">Your cart is empty.</p>
	<?php else: ?>
		<?php foreach ($cart as $itemId => $item): ?>
			<div class="cart-line">
				<div>
					<strong><?php echo e($item['name']); ?></strong>
					<span><?php echo (int) $item['quantity']; ?> &middot; £<?php echo number_format((float) $item['price'], 2); ?></span>
				</div>
				<form method="post" action="cart.php">
					<input type="hidden" name="action" value="remove">
					<input type="hidden" name="item_id" value="<?php echo e($itemId); ?>">
					<button class="remove-btn" type="submit">Remove</button>
				</form>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>

<div class="cart-total">
	<span>Total</span>
	<strong>£<?php echo number_format($total, 2); ?></strong>
</div>

<?php if ($cart): ?>
	<a href="orders.php" class="btn">Proceed to checkout</a>
<?php else: ?>
	<a href="products.php" class="btn">Continue shopping</a>
<?php endif; ?>

</div>
</main>

</body>
</html>
