<?php
session_start();
include 'config.php';

$buyer_id = $_SESSION['user_id'];
$res = $conn->query(
  "SELECT SUM(quantity) q FROM cart WHERE buyer_id=$buyer_id"
);
echo $res->fetch_assoc()['q'] ?? 0;
