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
    width:450px;
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
<input type="text" name="name" placeholder="Full Name" required>
</div>

<div class="form-group">
<input type="email" name="email" placeholder="Email Address" required>
</div>

<div class="form-group">
<input type="password" name="password" placeholder="Password" required>
</div>

<input type="submit" value="Create Account" class="btn">

</form>

<a href="index.php" class="home">
← Back to Home
</a>

</div>

</body>

</html>