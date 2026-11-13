<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/vehicle_data.php';

$user = require_signed_in();
$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';
$vehicleName = '';
foreach (vehicle_catalogue() as $vehicle) {
    if ($vehicle['id'] === ($_GET['vehicle'] ?? $_POST['vehicle_id'] ?? '')) {
        $vehicleName = $vehicle['make'] . ' ' . $vehicle['model'];
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Arrange a viewing | Price Prestige Motors</title>
<link rel="stylesheet" href="styles.css">
<style>
body{background:#f5f3ef;color:#171717;font-family:Arial,sans-serif}
.shell{margin:70px auto;max-width:620px;padding:0 20px}.card{background:#fff;padding:42px;box-shadow:0 12px 35px rgba(0,0,0,.1)}
.eyebrow{color:#b79b68;font-size:.72rem;letter-spacing:.2em;text-transform:uppercase}h1{font-family:Georgia,serif;font-weight:500;margin:12px 0}.intro{color:#737373;line-height:1.6;margin-bottom:25px}
.form-group{margin-bottom:18px}label{display:block;font-size:.82rem;font-weight:bold;margin-bottom:7px}input,textarea{border:1px solid #dedbd4;box-sizing:border-box;font:inherit;padding:13px;width:100%}textarea{min-height:120px;resize:vertical}
.button{background:#171717;border:0;color:#fff;cursor:pointer;font-size:.75rem;letter-spacing:.12em;padding:15px;text-transform:uppercase;width:100%}.success{background:#edf6ee;color:#28633a;line-height:1.6;padding:15px}
.back{color:#737373;display:block;font-size:.85rem;margin-top:22px;text-align:center}.back a{color:#171717}
</style>
</head>
<body>
<main class="shell"><div class="card">
<span class="eyebrow">Private client service</span>
<?php if ($submitted): ?>
    <h1>Thank you, <?php echo e($user['name']); ?>.</h1>
    <p class="success">Your enquiry has been received. Our team will contact you at <?php echo e($user['email']); ?> to arrange your viewing.</p>
<?php else: ?>
    <h1>Arrange a viewing</h1>
    <p class="intro">Tell us which vehicle has caught your eye and our team will be in touch.</p>
    <form method="post">
        <div class="form-group"><label for="vehicle">Vehicle</label><input id="vehicle" name="vehicle" value="<?php echo e($vehicleName); ?>" placeholder="For example, Porsche 911 Carrera 4S" required></div>
        <div class="form-group"><label for="message">Message</label><textarea id="message" name="message" placeholder="Tell us how we can help"></textarea></div>
        <button class="button" type="submit">Send enquiry</button>
    </form>
<?php endif; ?>
<a class="back" href="products.php">&larr; Back to inventory</a>
</div></main>
</body>
</html>
