<?php
// delete_order.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a database connection established (e.g., $conn)
    include("conn.php");
    $order_id = $_POST['order_id'];

    // Retrieve existing quantity
    $sql = "SELECT quantity FROM orders WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $order_id);
    $stmt->execute();
    $stmt->bind_result($existing_quantity);
    $stmt->fetch();
    $stmt->close();
        // Delete the order
        $delete_sql = "DELETE FROM orders WHERE order_id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param('s', $order_id);
        if ($delete_stmt->execute()) {
            echo '<script>alert("Deleted successfully")</script>';
        } else {
            echo '<script>alert("Failed to delete")</script>';
        }

    // Close the database connection
    $conn->close();
} else {
    echo '<script>alert("server error")</script>';
}
require_once("products.php");
?>
