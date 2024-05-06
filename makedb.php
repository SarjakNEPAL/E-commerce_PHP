
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
        <div class="content">
            <!-- Lipstick Product Card -->
            <div class="product-card">
                <p>Product Name: Lipstick</p>
                <form method="POST" action="buy.php" name="Cart">
                <button class="add-to-cart-btn" name="add-to-cart-btn" value="0" >Add to cart</button>
            </div>

            <!-- Face Wash Product Card -->
            <div class="product-card">
                <p>Product Name: Face Wash</p>
                <button class="add-to-cart-btn" name="add-to-cart-btn" action="buy.php" value="1">Add to cart</button>
            </div>

            <!-- Face Cream Product Card -->
            <div class="product-card">
                <p>Product Name: Face Cream</p>
                <button  class="add-to-cart-btn" name="add-to-cart-btn" action="buy.php" value="2">Add to cart</button>
            </div>

            <!-- Vaseline Product Card -->
            <div class="product-card">
                <p>Product Name: Vaseline</p>
                <button class="add-to-cart-btn" name="add-to-cart-btn" action="buy.php" value="3">Add to cart</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
