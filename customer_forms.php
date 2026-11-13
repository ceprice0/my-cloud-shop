<?php

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/vehicle_data.php';

$user = require_signed_in();
$type = (string) ($_GET['type'] ?? $_POST['type'] ?? 'finance');
$labels = array(
    'testdrive' => array('Test drive request', 'Choose a preferred date and our team will confirm availability.'),
    'finance' => array('Finance enquiry', 'Tell us about your budget and we will prepare an estimate.'),
    'tradein' => array('Trade-in valuation', 'Share your current vehicle details for an initial valuation.')
);
if (!isset($labels[$type])) {
    $type = 'finance';
}
start_user_session();
$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';
if ($submitted) {
    $_SESSION['requests'][] = array('type' => $labels[$type][0], 'created' => date('Y-m-d H:i'));
}
$vehicleName = '';
foreach (vehicle_catalogue() as $vehicle) {
    if ($vehicle['id'] === ($_GET['vehicle'] ?? $_POST['vehicle'] ?? '')) {
        $vehicleName = $vehicle['make'] . ' ' . $vehicle['model'];
    }
}
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"><title><?php echo e($labels[$type][0]); ?> | Price Prestige Motors</title><style>
body{background:#f5f3ef;color:#171717;font-family:Arial,sans-serif}.shell{margin:60px auto;max-width:620px;padding:0 20px}.card{background:#fff;padding:40px;box-shadow:0 12px 35px #00000012}.eyebrow{color:#b79b68;font-size:.7rem;letter-spacing:.2em;text-transform:uppercase}h1{font-family:Georgia,serif;font-weight:500}.intro{color:#737373;line-height:1.6}label{display:block;font-size:.8rem;font-weight:bold;margin:18px 0 7px}input,select,textarea{border:1px solid #dedbd4;box-sizing:border-box;font:inherit;padding:12px;width:100%}textarea{min-height:110px}.button{background:#171717;border:0;color:#fff;cursor:pointer;margin-top:22px;padding:15px;text-transform:uppercase;width:100%}.success{background:#edf6ee;color:#28633a;margin-top:20px;padding:15px}
</style></head><body><main class="shell"><div class="card"><span class="eyebrow">Private client service</span><h1><?php echo e($labels[$type][0]); ?></h1><?php if ($submitted): ?><p class="success">Thank you, <?php echo e($user['name']); ?>. Your request has been recorded for follow-up.</p><a href="account.php">View my account</a><?php else: ?><p class="intro"><?php echo e($labels[$type][1]); ?></p><form method="post"><input type="hidden" name="type" value="<?php echo e($type); ?>"><label for="vehicle">Vehicle</label><input id="vehicle" name="vehicle" value="<?php echo e($vehicleName); ?>" placeholder="Vehicle of interest"><?php if ($type === 'finance'): ?><label for="price">Vehicle price (&pound;)</label><input id="price" type="number" value="100000" min="1"><label for="deposit">Deposit (&pound;)</label><input id="deposit" type="number" value="20000" min="0"><label for="term">Term</label><select id="term"><option value="36">36 months</option><option value="48">48 months</option><option value="60">60 months</option></select><label for="apr">Representative APR (%)</label><input id="apr" type="number" value="8.9" min="0" step=".1"><p class="success" id="estimate">Estimated monthly payment: &pound;—<br><small>Illustrative estimate only.</small></p><?php else: ?><label for="date">Preferred date</label><input id="date" name="date" type="date"><?php endif; ?><label for="message">Additional details</label><textarea id="message" name="message" placeholder="Tell us more"></textarea><button class="button" type="submit">Submit request</button></form><?php endif; ?><p><a href="products.php">&larr; Back to inventory</a></p></div></main><?php if ($type === 'finance'): ?><script>const fields=['price','deposit','term','apr'];function updateEstimate(){const price=Number(document.getElementById('price').value)||0;const deposit=Number(document.getElementById('deposit').value)||0;const months=Number(document.getElementById('term').value)||36;const rate=(Number(document.getElementById('apr').value)||0)/1200;const principal=Math.max(price-deposit,0);const payment=rate===0?principal/months:principal*rate/(1-Math.pow(1+rate,-months));document.getElementById('estimate').firstChild.textContent='Estimated monthly payment: £'+payment.toLocaleString('en-GB',{minimumFractionDigits:2,maximumFractionDigits:2});}fields.forEach((id)=>document.getElementById(id).addEventListener('input',updateEstimate));updateEstimate();</script><?php endif; ?></body></html>
