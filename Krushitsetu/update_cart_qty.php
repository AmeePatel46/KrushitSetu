<?php
include 'auth_check.php';
include 'config.php';

$pid = $_POST['product_id'];
$delta = $_POST['delta'];
$bid = $_SESSION['user_id'];

$conn->query("
UPDATE cart 
SET quantity = GREATEST(quantity+$delta,1)
WHERE buyer_id=$bid AND product_id=$pid
");

$res = $conn->query("
SELECT quantity FROM cart 
WHERE buyer_id=$bid AND product_id=$pid
");

echo $res->fetch_assoc()['quantity'];
