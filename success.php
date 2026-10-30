<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Successful - MyShop</title>

<style>

body{
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg,#667eea,#764ba2);
    min-height:100vh;
    margin:0;
    display:flex;
    justify-content:center;
    align-items:center;
}

.card{
    background:white;
    padding:40px;
    border-radius:15px;
    text-align:center;
    width:500px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

.icon{
    font-size:70px;
    margin-bottom:20px;
}

h1{
    color:#28a745;
    margin-bottom:15px;
}

p{
    color:#555;
    font-size:18px;
    margin-bottom:30px;
}

.btn{
    display:inline-block;
    padding:12px 25px;
    margin:10px;
    text-decoration:none;
    color:white;
    border-radius:8px;
    font-weight:bold;
    transition:0.3s;
}

.home{
    background:#007bff;
}

.home:hover{
    background:#0056b3;
}

.users{
    background:#28a745;
}

.users:hover{
    background:#218838;
}

.stats{
    background:#ff9800;
}

.stats:hover{
    background:#e68900;
}

</style>
</head>

<body>

<div class="card">

    <div class="icon">✅</div>

    <h1>Registration Successful!</h1>

    <p>
        Your account has been successfully created and stored in the Azure SQL
        Database. Welcome to MyShop!
    </p>

    <a href="index.php" class="btn home">
        Back Home
    </a>

    <a href="users.php" class="btn users">
        View Users
    </a>

    <a href="stats.php" class="btn stats">
        Dashboard
    </a>

</div>

</body>
</html>