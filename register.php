<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register - MyShop</title>

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.register-form {
    background: white;
    padding: 30px;
    border-radius: 8px;
    max-width: 400px;
    margin: 50px auto;
}

.form-group {
    margin-bottom: 15px;
}

input {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
}

.btn {
    background: #007bff;
    color: white;
    border: none;
    padding: 10px;
    width: 100%;
}
</style>
</head>

<body>

<div class="register-form">

<h2>Register</h2>

<form method="post" action="process_register.php">

<div class="form-group">
<input type="text" name="name" placeholder="Full Name" required>
</div>

<div class="form-group">
<input type="email" name="email" placeholder="Email" required>
</div>

<div class="form-group">
<input type="password" name="password" placeholder="Password" required>
</div>

<input type="submit" value="Register" class="btn">

</form>

</div>

</body>
</html>