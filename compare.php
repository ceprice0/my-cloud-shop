<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/vehicle_data.php';
start_user_session();
$vehicles = vehicle_catalogue();
$selected = $_SESSION['compare'] ?? array();
if (isset($_GET['add'])) {
    $selected[] = (string) $_GET['add'];
    $_SESSION['compare'] = array_values(array_unique(array_slice($selected, -3)));
    header('Location: compare.php');
    exit();
}
$compare = array_values(array_filter($vehicles, function ($vehicle) use ($selected) { return in_array($vehicle['id'], $selected, true); }));
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"><title>Compare vehicles | Price Prestige Motors</title><style>
body{background:#f5f3ef;color:#171717;font-family:Arial,sans-serif;margin:0}.wrap{margin:auto;max-width:1100px;padding:55px 6vw}.eyebrow{color:#b79b68;font-size:.7rem;letter-spacing:.2em;text-transform:uppercase}h1{font-family:Georgia,serif;font-size:3rem;font-weight:500}.intro{color:#737373;line-height:1.6}.grid{display:grid;gap:18px;grid-template-columns:repeat(auto-fit,minmax(230px,1fr));margin-top:30px}.card{background:#fff;padding:18px}.card img{height:170px;object-fit:cover;width:100%}.card h2{font-family:Georgia,serif;font-weight:500}.row{border-top:1px solid #dedbd4;margin-top:12px;padding:12px 0}.label{color:#737373;display:block;font-size:.7rem;letter-spacing:.1em;text-transform:uppercase}.button{background:#171717;color:#fff;display:inline-block;font-size:.7rem;letter-spacing:.1em;margin-top:25px;padding:14px;text-decoration:none;text-transform:uppercase}
</style></head><body><main class="wrap"><span class="eyebrow">Your shortlist</span><h1>Compare vehicles</h1><p class="intro">Compare up to three vehicles side by side.</p><div class="grid"><?php if (!$compare): ?><p>No vehicles selected yet. <a href="products.php">Browse inventory</a></p><?php else: ?><?php foreach ($compare as $vehicle): ?><article class="card"><img src="<?php echo e($vehicle['photo']); ?>" alt="<?php echo e($vehicle['make'].' '.$vehicle['model']); ?>"><h2><?php echo e($vehicle['make'].' '.$vehicle['model']); ?></h2><div class="row"><span class="label">Price</span>&pound;<?php echo number_format($vehicle['price']); ?></div><div class="row"><span class="label">Year / mileage</span><?php echo $vehicle['year'].' · '.e($vehicle['mileage']); ?></div><div class="row"><span class="label">Engine</span><?php echo e($vehicle['engine']); ?></div><a href="vehicle.php?id=<?php echo urlencode($vehicle['id']); ?>">View vehicle</a></article><?php endforeach; ?><?php endif; ?></div><a class="button" href="products.php">Back to inventory</a></main></body></html>
