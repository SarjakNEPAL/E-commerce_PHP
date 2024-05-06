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
                <li><a href="makedb.php">BACK</a></li>
            </ul>
        </div>
    </span>
    <div class="content">
        <div class="Ment">
<?php
// Assuming you have a database connection established (e.g., $conn)
include("conn.php");

$sql = "SELECT order_id, quantity FROM orders";
$result = $conn->query($sql);

echo '<table>';
echo '<tr><th>Product Name</th><th>Quantity</th><th>Actions</th></tr>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $order_id = $row['order_id'];
        $quantity = $row['quantity'];

        // Determine product name based on order ID
        if ($order_id == 0) {
            $product = "Lipstick";
        } elseif ($order_id == 1) {
            $product = "Face Wash";
        } elseif ($order_id == 2) {
            $product = "Face Cream";
        } elseif ($order_id == 3) {
            $product = "Vaseline";
        }
        echo'<style>table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px; /* Set a maximum width if needed */
            margin: 0 auto; /* Center horizontally */
            background-color: blue; /* Grey background */
            border: 2px solid pink; /* Pink border */
        }
        
        /* Style table cells (td and th) */
        td, th {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: white; /* White font color */
        }</style>';
        // Display each row
       echo '<tr style="background-color:grey;">';
        echo '<td>' . $product . '</td>';
        echo '<td>' . $quantity . '</td>';
        echo '<td>';
        // Button to delete if quantity is 0
        echo '<form method="post" action="delete_order.php">';
        echo '<input type="hidden" name="order_id" value="' . $order_id . '">';
        echo '<input type="submit" name="delete_order" value="Delete">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '</table>';
    echo 'No orders found.';
}

// Close the database connection
$conn->close();
?>
        </div>
    </div>
</body>
</html>
