<?php
$conn = new mysqli("127.0.0.1:3308", "inventory_user", "inventory_pass", "inventory_db");

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
?>
