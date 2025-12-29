<?php
include 'auth_check.php';
include 'config.php';

$buyer_id = $_SESSION['user_id'];
$payment = $_POST['payment_method'] ?? 'COD';

/* Create order */
$conn->query(
  "INSERT INTO orders (buyer_id, total_amount, payment_method, status)
   VALUES ($buyer_id, 0, '$payment', 'PLACED')"
);

$order_id = $conn->insert_id;

/* Fetch cart */
$res = $conn->query("
  SELECT c.*, p.price, p.farmer_id 
FROM cart c 
JOIN products p ON c.product_id = p.id
WHERE c.buyer_id = $buyer_id

");

$total = 0;

while($row = $res->fetch_assoc()){
  $subtotal = $row['price'] * $row['quantity'];
  $total += $subtotal;

  /* Save order items */
  $conn->query(
    "INSERT INTO order_items 
     (order_id, product_id, farmer_id, price, quantity)
     VALUES ($order_id, {$row['product_id']}, {$row['farmer_id']},
             {$row['price']}, {$row['quantity']})"
  );

  /* Reduce stock */
  $conn->query(
    "UPDATE products 
     SET quantity = quantity - {$row['quantity']}
     WHERE id = {$row['product_id']}"
  );

  /* Notify farmer for each product purchased */
$conn->query("
INSERT INTO notifications(user_id,message,created_at)
VALUES({$row['farmer_id']},
'📦 New Order Received! Product ID {$row['product_id']} (Qty {$row['quantity']})',
NOW())
");


/* Update total */
$conn->query(
  "UPDATE orders SET total_amount = $total WHERE id = $order_id"
);

/* Clear cart */
$conn->query("DELETE FROM cart WHERE buyer_id = $buyer_id");

/* Redirect */
header("Location: order_success.php");
exit;
/* Notify farmer */

