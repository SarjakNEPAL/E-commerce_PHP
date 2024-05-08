<?php
    require_once("conn.php");
    
    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>E-Mart</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="icon" type="image/png" href="makeup.png" sizes="32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="banner">
        <span class="topban">
            <div class="navbar">
                <img src="makeup.png" class="logo">
                <h1 class="logotxt">E-Mart</h1>
                <ul>
                    <li><a href="products.php">My Orders</a></li>
                </ul>
            </div>
</span>
</body>
</html>