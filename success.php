<!DOCTYPE html>
<html>
<head>

<title>Account Created</title>

<style>

body{
font-family:Arial;
background:linear-gradient(135deg,#667eea,#764ba2);
display:flex;
justify-content:center;
align-items:center;
height:100vh;
margin:0;
}

.card{
background:white;
padding:40px;
border-radius:15px;
text-align:center;
width:550px;
}

.icon{
font-size:80px;
}

.btn{
display:inline-block;
padding:12px 25px;
margin:10px;
color:white;
text-decoration:none;
border-radius:8px;
font-weight:bold;
}

.home{background:#007bff;}
.products{background:#28a745;}
.dashboard{background:#ff9800;}

</style>

</head>

<body>

<div class="card">

<div class="icon">✅</div>

<h1>Welcome to CloudCart!</h1>

<p>
Customer account created successfully.
Your information has been securely stored
in Azure SQL Database.
</p>

<a href="index.php" class="btn home">
Home
</a>

<a href="products.php" class="btn products">
Browse Products
</a>

<a href="stats.php" class="btn dashboard">
Dashboard
</a>

</div>

</body>
</html>