<?php
// Include database connection
include 'db.php';

// Set headers for Excel file download
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=inventory_export.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Output the table header
echo "<table border='1'>";
echo "<tr>
        <th>ID</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Single Price (₹)</th>
        <th>Total Price (₹)</th>
      </tr>";

// Fetch data from DB
$result = $conn->query("SELECT * FROM items ORDER BY id ASC");
while ($row = $result->fetch_assoc()) {
    $total_price = $row['quantity'] * $row['price'];
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['item_name']}</td>
            <td>{$row['quantity']}</td>
            <td>{$row['price']}</td>
            <td>{$total_price}</td>
          </tr>";
}

echo "</table>";
?>
