<?php
require_once("conn.php");

$selected = $_POST["add-to-cart-btn"];
$sql = "SELECT quantity FROM orders WHERE order_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $selected);
$stmt->execute();
$stmt->bind_result($existing_quantity);
$stmt->fetch();
$stmt->close(); // Close the statement to avoid conflicts

if ($existing_quantity !== null) {
    // Product already exists, update quantity
    $new_quantity = $existing_quantity + 1;
    $update_sql = "UPDATE orders SET quantity = ? WHERE order_id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param('is', $new_quantity, $selected);
    if ($update_stmt->execute()) {
        echo '<script>alert("Quantity updated successfully")</script>';
    } else {
        echo '<script>alert("Failed to update quantity")</script>';
    }
} else {
    // Product doesn't exist, insert new record
    $insert_sql = "INSERT INTO orders (order_id, quantity) VALUES (?, 1)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param('s', $selected);
    if ($insert_stmt->execute()) {
        echo '<script>alert("Added new product")</script>';
        include("makedb.php");
    } else {
        echo '<script>alert("Failed to add new product")</script>';
    }
}
include("makedb.php");
// Close database connection
$conn->close();
?>
