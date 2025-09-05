<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item_name = $_POST['item_name'];
    $quantity = (int)$_POST['quantity'];
    $price = (float)$_POST['price'];

    $stmt = $conn->prepare("INSERT INTO items (item_name, quantity, price) VALUES (?, ?, ?)");
    $stmt->bind_param("sid", $item_name, $quantity, $price);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Item - Inventory</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .container {
            max-width: 600px;
            margin: 60px auto;
            background: #fff;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
        }

        h2 {
            color: #004080;
            margin-bottom: 25px;
            text-align: center;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #004080;
            color: white;
            border: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background: #003060;
        }

        a.back-link {
            display: inline-block;
            margin-top: 20px;
            color: #004080;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Inventory Item</h2>
        <form method="POST">
            <input type="text" name="item_name" placeholder="📦 Item Name" required>
            <input type="number" name="quantity" placeholder="🔢 Quantity" required min="1">
            <input type="number" step="0.01" name="price" placeholder="💵 Unit Price (₹)" required min="0">
            <button type="submit">➕ Add Item</button>
        </form>
        <a class="back-link" href="index.php">⬅ Back to Inventory</a>
    </div>
</body>
</html>
