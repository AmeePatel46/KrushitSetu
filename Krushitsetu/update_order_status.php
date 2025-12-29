<?php
include 'auth_check.php';
include 'config.php';

$order_id = $_POST['order_id'];
$status   = $_POST['status'];
$fid      = $_SESSION['user_id'];

/* Update order status */
$conn->query("UPDATE orders SET status='$status' WHERE id=$order_id");

/* Get buyer id */
$res = $conn->query("SELECT buyer_id FROM orders WHERE id=$order_id");
$buyer = $res->fetch_assoc()['buyer_id'];

/* Notify buyer */
$conn->query("
 INSERT INTO notifications (user_id,message,created_at)
 VALUES ($buyer,'🚚 Order #$order_id status updated to $status',NOW())
");

header("Location: farmer_orders.php");
exit;
