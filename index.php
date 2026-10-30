<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MyShop Cloud Platform</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:linear-gradient(135deg,#667eea,#764ba2);
    min-height:100vh;
    color:white;
}

.header{
    text-align:center;
    padding:40px 20px;
}

.header h1{
    font-size:60px;
    margin-bottom:10px;
}

.header p{
    font-size:22px;
}

.hero{
    text-align:center;
    padding:60px 20px;
}

.hero h2{
    font-size:42px;
    margin-bottom:20px;
}

.hero p{
    font-size:20px;
    max-width:700px;
    margin:auto;
    line-height:1.6;
}

.buttons{
    margin-top:40px;
}

.btn{
    display:inline-block;
    padding:15px 30px;
    margin:10px;
    border-radius:8px;
    text-decoration:none;
    font-size:18px;
    font-weight:bold;
    transition:0.3s;
}

.btn-register{
    background:#28a745;
    color:white;
}

.btn-register:hover{
    background:#218838;
}

.btn-users{
    background:#007bff;
    color:white;
}

.btn-users:hover{
    background:#0056b3;
}

.btn-stats{
    background:#ff9800;
    color:white;
}

.btn-stats:hover{
    background:#e68900;
}

.cards{
    display:flex;
    justify-content:center;
    gap:20px;
    flex-wrap:wrap;
    padding:50px 20px;
}

.card{
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(10px);
    width:300px;
    padding:30px;
    border-radius:15px;
    text-align:center;
}

.card h3{
    margin-bottom:15px;
}

.footer{
    text-align:center;
    padding:30px;
    opacity:0.9;
}

</style>
</head>

<body>

<div class="header">
    <h1>🛒 MyShop</h1>
    <p>Cloud Hosted PHP & Azure SQL Application</p>
</div>

<div class="hero">

    <h2>Welcome to MyShop</h2>

    <p>
        This cloud application demonstrates a complete PHP registration system
        deployed to Microsoft Azure App Service with Azure SQL Database integration.
    </p>

    <div class="buttons">

        <a href="register.php" class="btn btn-register">
            Create Account
        </a>

        <a href="users.php" class="btn btn-users">
            View Users
        </a>

        <a href="stats.php" class="btn btn-stats">
            Dashboard
        </a>

    </div>

</div>

<div class="cards">

    <div class="card">
        <h3>☁ Azure App Service</h3>
        <p>
            Modern PHP web application hosted in Microsoft Azure.
        </p>
    </div>

    <div class="card">
        <h3>🗄 Azure SQL Database</h3>
        <p>
            User registration data stored securely in the cloud.
        </p>
    </div>

    <div class="card">
        <h3>🚀 GitHub Deployment</h3>
        <p>
            Automated deployment using GitHub integration.
        </p>
    </div>

</div>

<div class="footer">
    <p>Developed by Calum Price | Cloud Computing Workshop</p>
</div>

</body>
</html>
``