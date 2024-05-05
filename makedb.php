<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'sbh');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to add product to cart
function addToCart($productName) {
    global $conn; // Access the database connection

    // Prepare the statement
    $stmt = $conn->prepare("INSERT INTO carts (user_id, product_id, quantity) VALUES (1, ?, 1)");
    $stmt->bind_param("s", $productName); // Bind the product name parameter

    // Execute the query
    if ($stmt->execute()) {
        echo "Product \"$productName\" has been added to the cart.";
    } else {
        echo "Error adding product to cart: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Example usage
if (isset($_POST['product_name'])) {
    $productName = $_POST['product_name']; // Get the product name from user input
    addToCart($productName);
}
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
        <div class="content">
            <!-- Lipstick Product Card -->
            <div class="product-card">
                <p>Product Name: Lipstick</p>
                <button class="add-to-cart-btn" onclick="addToCart('Lipstick')">Add to Cart</button>
            </div>

            <!-- Face Wash Product Card -->
            <div class="product-card">
                <p>Product Name: Face Wash</p>
                <button class="add-to-cart-btn" onclick="addToCart('Face Wash')">Add to Cart</button>
            </div>

            <!-- Face Cream Product Card -->
            <div class="product-card">
                <p>Product Name: Face Cream</p>
                <button class="add-to-cart-btn" onclick="addToCart('Face Cream')">Add to Cart</button>
            </div>

            <!-- Vaseline Product Card -->
            <div class="product-card">
                <p>Product Name: Vaseline</p>
                <button class="add-to-cart-btn" onclick="addToCart('Vaseline')">Add to Cart</button>
            </div>
        </div>

        <!-- Repeat the above structure for other products -->

        <script>
            // Function to add product to cart
            function addToCart(productName) {
                alert(`Product "${productName}" has been added to the cart.`);
                // Your cart logic here (localStorage, database, etc.)
                // You can use AJAX to send the product details to a PHP script for database insertion.
                // For example, make an AJAX request to a PHP endpoint that handles cart updates.
                // Remember to replace placeholders with actual logic.
            }
        </script>
    </div>
</body>
</html>
