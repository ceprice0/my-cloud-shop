<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CloudCart Registration</title>

<style>

body{
    font-family:Arial,sans-serif;
    background:linear-gradient(135deg,#667eea,#764ba2);
    min-height:100vh;
    margin:0;
    display:flex;
    justify-content:center;
    align-items:center;
}

.register-form{
    background:white;
    width:min(450px, calc(100% - 32px));
    padding:40px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

h1{
    text-align:center;
    color:#333;
    margin-bottom:10px;
}

.subtitle{
    text-align:center;
    color:#666;
    margin-bottom:30px;
}

.form-group{
    margin-bottom:20px;
}

input{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:8px;
    box-sizing:border-box;
}

label{
    display:block;
    margin-bottom:8px;
    color:#333;
    font-weight:bold;
}

.btn{
    width:100%;
    background:#28a745;
    color:white;
    border:none;
    padding:14px;
    border-radius:8px;
    font-size:16px;
    font-weight:bold;
    cursor:pointer;
}

.btn:hover{
    background:#218838;
}

.home{
    display:block;
    text-align:center;
    margin-top:20px;
    color:#007bff;
    text-decoration:none;
}

</style>

</head>

<body>

<div class="register-form">

<h1>🛒 CloudCart</h1>

<p class="subtitle">
Create your customer account
</p>

<form method="post" action="process_register.php">

<div class="form-group">
<label for="name">Full name</label>
<input id="name" type="text" name="name" autocomplete="name" maxlength="100" required>
</div>

<div class="form-group">
<label for="email">Email address</label>
<input id="email" type="email" name="email" autocomplete="email" maxlength="255" required>
</div>

<div class="form-group">
<label for="password">Password</label>
<input id="password" type="password" name="password" autocomplete="new-password" minlength="8" required>
</div>

<input type="submit" value="Create Account" class="btn">

</form>

<a href="index.php" class="home">
← Back to Home
</a>

</div>

</body>

</html>