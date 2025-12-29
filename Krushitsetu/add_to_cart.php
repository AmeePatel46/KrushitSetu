<?php
session_start();
include 'config.php';

$buyer_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

$check = $conn->query(
  "SELECT * FROM cart WHERE buyer_id=$buyer_id AND product_id=$product_id"
);

if($check->num_rows > 0){
  $conn->query(
    "UPDATE cart SET quantity = quantity + 1 
     WHERE buyer_id=$buyer_id AND product_id=$product_id"
  );
}else{
  $conn->query(
    "INSERT INTO cart (buyer_id, product_id, quantity)
     VALUES ($buyer_id, $product_id, 1)"
  );
}

echo "ADDED";
