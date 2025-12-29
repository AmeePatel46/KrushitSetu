<?php
include 'auth_check.php';
include 'config.php';

$id = $_GET['id'];
$fid = $_SESSION['user_id'];

$conn->query("DELETE FROM products WHERE id='$id' AND farmer_id='$fid'");
header("Location: farmer_dashboard.php");
