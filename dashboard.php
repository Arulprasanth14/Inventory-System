<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

$result = $conn->query("SELECT * FROM items");
$total_items = $result->num_rows;

$total_value = 0;
$most_stocked_item = null;
$max_quantity = -1;

while ($row = $result->fetch_assoc()) {
    $total_value += $row['quantity'] * $row['price'];
    if ($row['quantity'] > $max_quantity) {
        $max_quantity = $row['quantity'];
        $most_stocked_item = $row['item_name'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Inventory</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .dashboard {
            padding: 40px;
            background: #f0f2f5;
        }

        .card-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
        }

        .card {
            flex: 1 1 250px;
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.07);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin-bottom: 10px;
            color: #004080;
        }

        .card p {
            font-size: 22px;
            font-weight: bold;
            color: #333;
        }

        .top-bar {
            background: #004080;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .top-bar a:hover {
            color: #ffcc00;
        }

        .actions {
            margin-top: 30px;
        }

        .actions a {
            display: inline-block;
            margin-right: 15px;
            padding: 12px 20px;
            background: #004080;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .actions a:hover {
            background: #003060;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <h2>📊 Dashboard</h2>
        <a href="logout.php">🔓 Logout</a>
    </div>

    <div class="dashboard">
        <div class="card-grid">
            <div class="card">
                <h3>Total Items</h3>
                <p><?= $total_items ?></p>
            </div>
            <div class="card">
                <h3>Total Inventory Value</h3>
                <p>₹<?= number_format($total_value, 2) ?></p>
            </div>
            <div class="card">
                <h3>Most Stocked Item</h3>
                <p><?= $most_stocked_item ? htmlspecialchars($most_stocked_item) : 'N/A' ?></p>
            </div>
        </div>

        <div class="actions">
            <a href="index.php">📦 Manage Inventory</a>
            <a href="add_item.php">➕ Add New Item</a>
        </div>
    </div>
</body>
</html>
