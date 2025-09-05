<?php
session_start();
if (!isset($_SESSION['loggedin'])) header("Location: login.php");
include 'db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM items WHERE id=$id");
header("Location: index.php");
?>
