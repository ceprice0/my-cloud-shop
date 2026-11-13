<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/vehicle_data.php';

require_signed_in();
start_user_session();

if (isset($_GET['remove'])) {
    $_SESSION['favourites'] = array_values(array_diff($_SESSION['favourites'] ?? array(), array((string) $_GET['remove'])));
    header('Location: favourites.php');
    exit();
}

if (isset($_GET['clear'])) {
    unset($_SESSION['favourites']);
    header('Location: favourites.php');
    exit();
}

$favouriteIds = $_SESSION['favourites'] ?? array();
$vehicles = array_values(array_filter(vehicle_catalogue(), function ($vehicle) use ($favouriteIds) {
    return in_array($vehicle['id'], $favouriteIds, true);
}));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Favourites | Price Prestige Motors</title>
<style>
body{background:#f5f3ef;color:#171717;font-family:Arial,sans-serif;margin:0}.wrap{margin:auto;max-width:1100px;padding:55px 6vw}.eyebrow{color:#b79b68;font-size:.7rem;letter-spacing:.2em;text-transform:uppercase}h1{font-family:Georgia,serif;font-size:3rem;font-weight:500}.intro{color:#737373;line-height:1.6}.actions{display:flex;flex-wrap:wrap;gap:12px;margin:25px 0}.button{background:#171717;color:#fff;display:inline-block;font-size:.7rem;letter-spacing:.1em;padding:13px;text-decoration:none;text-transform:uppercase}.button.light{background:#fff;color:#171717}.grid{display:grid;gap:18px;grid-template-columns:repeat(auto-fit,minmax(230px,1fr));margin-top:30px}.card{background:#fff;padding:15px}.card img{height:170px;object-fit:cover;width:100%}.card h2{font-family:Georgia,serif;font-weight:500}.card p{color:#737373;font-size:.85rem}.card-actions{display:flex;gap:12px;margin-top:16px}.card-actions a{font-size:.72rem;text-decoration:underline}
</style>
</head>
<body>
<main class="wrap">
<span class="eyebrow">Your shortlist</span>
<h1>Saved favourites</h1>
<p class="intro">Keep the vehicles you are considering in one place.</p>
<div class="actions"><a class="button" href="products.php">Browse inventory</a><a class="button light" href="compare.php">View comparison</a><?php if ($vehicles): ?><a class="button light" href="favourites.php?clear=1">Remove all</a><?php endif; ?></div>
<div class="grid">
<?php if (!$vehicles): ?><p>No favourites saved yet. Open a vehicle and choose “Save to favourites”.</p><?php else: ?><?php foreach ($vehicles as $vehicle): ?><article class="card"><img src="<?php echo e($vehicle['photo']); ?>" alt="<?php echo e($vehicle['make'].' '.$vehicle['model']); ?>"><h2><?php echo e($vehicle['make'].' '.$vehicle['model']); ?></h2><p>&pound;<?php echo number_format($vehicle['price']); ?> &middot; <?php echo e($vehicle['mileage']); ?></p><div class="card-actions"><a href="vehicle.php?id=<?php echo urlencode($vehicle['id']); ?>">View details</a><a href="favourites.php?remove=<?php echo urlencode($vehicle['id']); ?>">Remove</a></div></article><?php endforeach; ?><?php endif; ?>
</div>
</main>
</body>
</html>
