<?php
include 'auth_check.php';
include 'config.php';

$buyer_id = $_SESSION['user_id'];

$stmt = $conn->prepare("
INSERT INTO subscriptions(buyer_id,product_id,type,qty,duration,status)
VALUES (?,?,?,?,?,'ACTIVE')
");
$stmt->bind_param("iisis",
  $buyer_id, $_POST['product_id'], $_POST['type'], $_POST['qty'], $_POST['duration']
);
$stmt->execute();

header("Location: buyer_dashboard.php?subscribed=1");
exit;
