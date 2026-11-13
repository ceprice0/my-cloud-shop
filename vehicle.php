<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/vehicle_data.php';

$vehicles = vehicle_catalogue();
$id = (string) ($_GET['id'] ?? '');
$vehicle = null;
foreach ($vehicles as $candidate) {
    if ($candidate['id'] === $id) {
        $vehicle = $candidate;
        break;
    }
}

if ($vehicle === null) {
    http_response_code(404);
    exit('Vehicle not found.');
}

start_user_session();
$_SESSION['recent_vehicles'] = array_values(array_unique(array_merge(array($vehicle['id']), $_SESSION['recent_vehicles'] ?? array())));
$_SESSION['recent_vehicles'] = array_slice($_SESSION['recent_vehicles'], 0, 6);
$favourites = $_SESSION['favourites'] ?? array();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'favourite') {
    if (in_array($vehicle['id'], $favourites, true)) {
        $favourites = array_values(array_diff($favourites, array($vehicle['id'])));
    } else {
        $favourites[] = $vehicle['id'];
    }
    $_SESSION['favourites'] = $favourites;
    header('Location: vehicle.php?id=' . urlencode($vehicle['id']));
    exit();
}
$isFavourite = in_array($vehicle['id'], $favourites, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo e($vehicle['make'] . ' ' . $vehicle['model']); ?> | Price Prestige Motors</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Playfair+Display:wght@500;600&display=swap');
:root{--ink:#171717;--muted:#737373;--cream:#f5f3ef;--white:#fff;--gold:#b79b68;--line:#dedbd4}*{box-sizing:border-box;margin:0;padding:0}body{background:var(--cream);color:var(--ink);font-family:"DM Sans",Arial,sans-serif}a{color:inherit;text-decoration:none}.nav{align-items:center;background:#fff;display:flex;justify-content:space-between;padding:22px 6vw}.brand{font-family:Georgia,serif;font-size:1.35rem}.brand span{color:var(--gold);display:block;font-family:Arial,sans-serif;font-size:.57rem;letter-spacing:.3em;text-transform:uppercase}.nav-links{display:flex;gap:22px;font-size:.72rem;letter-spacing:.1em;text-transform:uppercase}.main{margin:auto;max-width:1250px;padding:55px 6vw 90px}.back{color:var(--muted);font-size:.76rem;letter-spacing:.1em;text-transform:uppercase}.layout{display:grid;gap:35px;grid-template-columns:1.15fr .85fr;margin-top:25px}.gallery{background:#d7d3cb}.gallery>img{cursor:zoom-in;display:block;height:470px;object-fit:cover;width:100%}.thumbs{display:grid;gap:8px;grid-template-columns:repeat(3,1fr);padding:8px}.thumbs img{cursor:pointer;height:100px;object-fit:cover;width:100%}.eyebrow{color:var(--gold);font-size:.7rem;letter-spacing:.2em;text-transform:uppercase}.details{background:#fff;padding:38px}.details h1{font-family:Georgia,serif;font-size:clamp(2rem,4vw,3.8rem);font-weight:500;line-height:1.05;margin:14px 0}.meta{color:var(--muted);line-height:1.8}.price{font-size:1.45rem;font-weight:600;margin:25px 0}.actions{display:grid;gap:10px;margin-top:25px}.button{background:var(--ink);border:0;color:#fff;cursor:pointer;display:block;font:inherit;font-size:.7rem;letter-spacing:.13em;padding:15px;text-align:center;text-transform:uppercase}.button.alt{background:var(--gold);color:var(--ink)}.button.light{background:var(--cream);color:var(--ink)}.specs{background:#fff;display:grid;gap:1px;grid-template-columns:repeat(2,1fr);margin-top:35px}.spec{border:1px solid var(--line);padding:20px}.spec strong{display:block;font-size:.7rem;letter-spacing:.1em;margin-bottom:8px;text-transform:uppercase}.spec span{color:var(--muted);font-size:.9rem}.lightbox{align-items:center;background:#000c;display:none;height:100%;justify-content:center;left:0;padding:25px;position:fixed;top:0;width:100%;z-index:5}.lightbox.open{display:flex}.lightbox img{max-height:90%;max-width:90%;object-fit:contain}@media(max-width:800px){.nav{align-items:flex-start;flex-direction:column;gap:15px}.nav-links{flex-wrap:wrap}.layout{grid-template-columns:1fr}.gallery>img{height:300px}}
</style>
</head>
<body>
<nav class="nav"><a class="brand" href="index.php">Price Prestige Motors<span>Luxury &amp; Performance</span></a><div class="nav-links"><a href="products.php">Inventory</a><a href="account.php">My account</a><a href="signin.php">Sign in</a></div></nav>
<main class="main">
<a class="back" href="products.php">&larr; Back to inventory</a>
<div class="layout">
<section class="gallery">
<img src="<?php echo e($vehicle['photo']); ?>" alt="<?php echo e($vehicle['make'] . ' ' . $vehicle['model']); ?>">
<div class="thumbs"><img src="<?php echo e($vehicle['photo']); ?>" alt="Exterior view"><img src="<?php echo e($vehicle['photo']); ?>" alt="Vehicle detail view"><img src="<?php echo e($vehicle['photo']); ?>" alt="Interior view"></div>
</section>
<section class="details">
<span class="eyebrow"><?php echo e($vehicle['tag']); ?></span>
<h1><?php echo e($vehicle['make'] . ' ' . $vehicle['model']); ?></h1>
<p class="meta"><?php echo $vehicle['year']; ?> &nbsp;·&nbsp; <?php echo e($vehicle['mileage']); ?> &nbsp;·&nbsp; <?php echo e($vehicle['type']); ?></p>
<div class="price">&pound;<?php echo number_format($vehicle['price']); ?></div>
<div class="actions">
<a class="button alt" href="customer_forms.php?type=testdrive&amp;vehicle=<?php echo urlencode($vehicle['id']); ?>">Arrange a test drive</a>
<a class="button" href="enquiry.php?vehicle=<?php echo urlencode($vehicle['id']); ?>">Enquire about this vehicle</a>
<form method="post"><input type="hidden" name="action" value="favourite"><button class="button light" type="submit"><?php echo $isFavourite ? 'Remove from favourites' : 'Save to favourites'; ?></button></form>
<a class="button light" href="compare.php?add=<?php echo urlencode($vehicle['id']); ?>">Add to comparison</a>
</div>
</section>
</div>
<div class="specs"><div class="spec"><strong>Engine</strong><span><?php echo e($vehicle['engine']); ?></span></div><div class="spec"><strong>Transmission</strong><span>Automatic</span></div><div class="spec"><strong>Fuel</strong><span>Petrol / hybrid specification</span></div><div class="spec"><strong>Preparation</strong><span>Inspected and prepared by our team</span></div></div>
</main>
<div class="lightbox" id="lightbox" role="dialog" aria-label="Vehicle image preview"><img src="<?php echo e($vehicle['photo']); ?>" alt=""><button type="button" onclick="document.getElementById('lightbox').classList.remove('open')">Close</button></div>
<script>
const mainImage = document.querySelector('.gallery>img');
const lightbox = document.getElementById('lightbox');
document.querySelectorAll('.thumbs img').forEach((thumb) => thumb.addEventListener('click', () => { mainImage.src = thumb.src; }));
mainImage.addEventListener('click', () => { lightbox.querySelector('img').src = mainImage.src; lightbox.classList.add('open'); });
</script>
</body>
</html>
