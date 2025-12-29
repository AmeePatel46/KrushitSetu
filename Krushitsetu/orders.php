<?php
include 'auth_check.php';
include 'config.php';

$buyer_id = $_SESSION['user_id'];
$res = $conn->query("
  SELECT * FROM orders 
  WHERE buyer_id=$buyer_id 
  ORDER BY id DESC
");
?>

<h2>📦 My Orders</h2>

<?php while($o = $res->fetch_assoc()): ?>
<div style="background:#fff;padding:20px;margin:15px;border-radius:20px">
  <p>Order ID: <?= $o['id'] ?></p>
  <p>Total: ₹<?= $o['total_amount'] ?></p>
  <p>Status: <strong><?= $o['status'] ?></strong></p>

  <progress value="
  <?php
    echo match($o['status']){
      'Placed'=>25,'Packed'=>50,'Shipped'=>75,'Delivered'=>100
    };
  ?>" max="100"></progress>
</div>
<?php endwhile; ?>
