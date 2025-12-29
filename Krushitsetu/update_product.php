<?php
include 'auth_check.php';
include 'config.php';

/* 1. Allow only POST */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  die("Invalid request");
}

/* 2. Get & validate data */
$id       = intval($_POST['id']);
$price    = floatval($_POST['price']);
$quantity = intval($_POST['quantity']);
$farmer_id = $_SESSION['user_id'];

if ($id <= 0 || $price <= 0 || $quantity < 0) {
  header("Location: farmer_dashboard.php?error=invalid");
  exit;
}

/* 3. Update product (farmer-safe) */
$sql = "
UPDATE products 
SET price = $price, quantity = $quantity
WHERE id = $id AND farmer_id = $farmer_id
";

if ($conn->query($sql)) {
  header("Location: farmer_dashboard.php?updated=1");
  exit;
} else {
  echo "UPDATE FAILED";
}
