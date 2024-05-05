<?php
// Start a session (if not already started)
session_start();

// Initialize cart array (if not set)
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add product to cart (example)
function addToCart($productId, $productName, $productPrice) {
    if (isset($_SESSION['cart'][$productId])) {
        // Product already in cart, update quantity
        $_SESSION['cart'][$productId]['quantity']++;
    } else {
        // New product, add to cart
        $_SESSION['cart'][$productId] = [
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => 1,
        ];
    }
}

// Example usage (when adding a product)
addToCart(1, 'Lipstick', 10.99);
addToCart(2, 'Face Wash', 7.99);

// Display cart items (on cart page)
foreach ($_SESSION['cart'] as $productId => $item) {
    echo "{$item['name']} ({$item['quantity']} x {$item['price']})<br>";
}

// Calculate total price
$totalPrice = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalPrice += $item['price'] * $item['quantity'];
}

// Checkout process (example)
if (isset($_POST['checkout'])) {
    $customerName = $_POST['customer_name'];
    // Save order details (customer name, products, total price) to SQL database
    // (Implement your database connection and query here)
    // ...
}
?>

<!-- Cart page HTML -->
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Your Cart</h1>
    <?php
    // Display cart items here
    // ...
    ?>
    <p>Total Price: $<?php echo $totalPrice; ?></p>
    <form method="post">
        <input type="text" name="customer_name" placeholder="Enter your name">
        <input type="submit" name="checkout" value="Checkout">
    </form>
</body>
</html>
