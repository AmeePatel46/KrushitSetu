<?php
include 'auth_check.php';
include 'config.php';

$buyer_id = $_SESSION['user_id'];

$res = $conn->query("
  SELECT c.*, p.name, p.price 
  FROM cart c 
  JOIN products p ON c.product_id = p.id
  WHERE c.buyer_id = $buyer_id
");
?>

<div style="max-width:900px;margin:auto;padding:20px">
<h2>🛒 My Cart</h2>

<?php while($row=$res->fetch_assoc()): ?>
<div style="
display:flex;
justify-content:space-between;
align-items:center;
background:#fff;
margin:15px 0;
padding:15px;
border-radius:15px;
box-shadow:0 8px 20px rgba(0,0,0,.15)">

  <div>
    <h4><?= $row['name'] ?></h4>
    <p>₹<?= $row['price'] ?>/kg</p>
  </div>

  <div style="display:flex;gap:10px;align-items:center">
    <form method="POST" action="update_cart.php">
      <input type="hidden" name="id" value="<?= $row['id'] ?>">
      <button name="action" value="dec">➖</button>
      <?= $row['quantity'] ?>
      <button name="action" value="inc">➕</button>
    </form>
  </div>

  <div>
    ₹<?= $row['price'] * $row['quantity'] ?>
  </div>

</div>
<?php endwhile; ?>

<a href="checkout.php" style="
display:block;
text-align:center;
background:#2e7d32;
color:#fff;
padding:12px;
border-radius:25px;
text-decoration:none">Proceed to Checkout</a>
</div>
