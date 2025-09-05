<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}
include 'db.php';

$result = $conn->query("SELECT * FROM items ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inventory Items</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .container {
            padding: 40px;
        }

        h2 {
            color: #004080;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        th {
            background: #004080;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #eee;
        }

        td:last-child a {
            margin-right: 10px;
            text-decoration: none;
            font-size: 18px;
        }

        .actions {
            margin-bottom: 25px;
        }

        .actions a {
            display: inline-block;
            margin-right: 15px;
            padding: 10px 18px;
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
    <div class="container">
        <h2>📦 Inventory List</h2>

        <div class="actions">
            <a href="add_item.php">➕ Add New</a>
            <a href="dashboard.php">📊 Dashboard</a>
            <a href="export_excel.php">📄 Export to Excel</a>
            <a href="logout.php">🔓 Logout</a>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Single Price (₹)</th>
                <th>Total Price (₹)</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['item_name']) ?></td>
                <td><?= $row['quantity'] ?></td>
                <td><?= number_format($row['price'], 2) ?></td>
                <td><?= number_format($row['quantity'] * $row['price'], 2) ?></td>
                <td>
                    <a href="edit_item.php?id=<?= $row['id'] ?>">✏️</a>
                    <a href="delete_item.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">🗑️</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
