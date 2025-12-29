<?php
include 'auth_check.php';
include 'config.php';

$fid = $_SESSION['user_id'];

$res = $conn->query("
   SELECT o.id, o.total_amount, o.status, u.name buyer, oi.product_id, oi.quantity
   FROM order_items oi
   JOIN orders o ON oi.order_id=o.id
   JOIN users u ON o.buyer_id=u.id
   WHERE oi.farmer_id=$fid
   ORDER BY o.id DESC
");
?>

<h2 style="margin:20px">📦 Orders Received</h2>

<?php if($res->num_rows==0): ?>
<p style="margin:20px;color:#777">No orders received yet</p>
<?php endif; ?>

<?php while($o=$res->fetch_assoc()): ?>
<div style="background:#fff;margin:15px;padding:15px;border-radius:15px">
<b>Buyer:</b> <?= $o['buyer'] ?><br>
<b>Order ID:</b> <?= $o['id'] ?><br>
<b>Total Amount:</b> ₹<?= $o['total_amount'] ?><br>
<b>Quantity Ordered:</b> <?= $o['quantity'] ?><br>
<b>Status:</b> <?= $o['status'] ?><br><br>

<form action="update_order.php" method="POST">
  <input type="hidden" name="order_id" value="<?= $o['id'] ?>">
  <select name="status">
    <option value="Placed">Placed</option>
    <option value="Packed">Packed</option>
    <option value="Shipped">Shipped</option>
    <option value="Delivered">Delivered</option>
  </select>
  <button>Update Status</button>
</form>

</div>
<?php endwhile; ?>
