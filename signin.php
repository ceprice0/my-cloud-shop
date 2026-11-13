<?php

require_once __DIR__ . '/auth.php';

$user = signed_in_user();
if ($user !== null) {
    header('Location: index.php');
    exit();
}

$error = $_GET['error'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign in | Price Prestige Motors</title>
<link rel="stylesheet" href="styles.css">
<style>
body{background:#f5f3ef;color:#171717;font-family:Arial,sans-serif}
.auth-shell{margin:70px auto;max-width:460px;padding:0 20px}
.auth-card{background:#fff;padding:42px;box-shadow:0 12px 35px rgba(0,0,0,.1)}
h1{font-family:Georgia,serif;font-weight:500;margin:12px 0}
.eyebrow{color:#b79b68;font-size:.72rem;letter-spacing:.2em;text-transform:uppercase}
.intro{color:#737373;line-height:1.6;margin-bottom:25px}
.form-group{margin-bottom:18px}
label{display:block;font-size:.82rem;font-weight:bold;margin-bottom:7px}
input{border:1px solid #dedbd4;border-radius:0;box-sizing:border-box;font:inherit;padding:13px;width:100%}
.remember{align-items:center;display:flex;gap:8px;font-size:.82rem;margin:18px 0}
.remember input{width:auto}
.button{background:#171717;border:0;color:#fff;cursor:pointer;font-size:.75rem;letter-spacing:.12em;padding:15px;text-transform:uppercase;width:100%}
.error{background:#fbe9e7;color:#9b2c25;font-size:.85rem;margin-bottom:20px;padding:12px}
.alternate{color:#737373;font-size:.85rem;margin-top:22px;text-align:center}.alternate a{color:#171717}
</style>
</head>
<body>
<main class="auth-shell">
<div class="auth-card">
<span class="eyebrow">Price Prestige Motors</span>
<h1>Welcome back</h1>
<p class="intro">Sign in to manage your enquiries and continue your vehicle search.</p>
<?php if ($error): ?><div class="error" role="alert"><?php echo e($error); ?></div><?php endif; ?>
<form method="post" action="process_login.php">
<div class="form-group"><label for="email">Email address</label><input id="email" type="email" name="email" autocomplete="email" required></div>
<div class="form-group"><label for="password">Password</label><input id="password" type="password" name="password" autocomplete="current-password" required></div>
<label class="remember"><input type="checkbox" name="remember" value="1"> Keep me signed in for 30 days</label>
<button class="button" type="submit">Sign in</button>
</form>
<p class="alternate">New to Price Prestige Motors? <a href="register.php">Create an account</a></p>
</div>
</main>
</body>
</html>
