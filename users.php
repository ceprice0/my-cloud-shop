<?php

$serverName = "tcp:an-sql-server1.database.windows.net,1433";

$connectionOptions = array(
    "Database" => "calumsdatabase",
    "Uid" => "AdminAN",
    "PWD" => "Taily1047*",
    "Encrypt" => 1,
    "TrustServerCertificate" => 0
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

$sql = "SELECT id, name, email, created_at FROM shopusers ORDER BY id DESC";

$stmt = sqlsrv_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>Registered Users</title>

<style>
body{
font-family:Arial;
background:#f4f4f4;
padding:30px;
}

table{
width:100%;
background:white;
border-collapse:collapse;
}

th,td{
padding:12px;
border:1px solid #ddd;
}

th{
background:#007bff;
color:white;
}

h1{
text-align:center;
}

a{
text-decoration:none;
padding:10px 20px;
background:#007bff;
color:white;
border-radius:5px;
}
</style>

</head>
<body>

<h1>Registered Users</h1>

<p><a href="index.php">Home</a></p>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Registered</th>
</tr>

<?php
while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
{
echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['created_at']->format('Y-m-d H:i:s')."</td>";
echo "</tr>";
}
?>

</table>

</body>
</html>