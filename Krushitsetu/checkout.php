<?php
include 'auth_check.php';
include 'config.php';

$bid = $_SESSION['user_id'];
$res = $conn->query("
SELECT p.name,p.price,c.quantity 
FROM cart c 
JOIN products p ON p.id=c.product_id
WHERE c.buyer_id=$bid
");

$total = 0;
?>

<div style="max-width:900px;margin:auto;padding:20px">
<h2>🧾 Order Summary</h2>

<?php while($r=$res->fetch_assoc()):
  $sub = $r['price']*$r['quantity'];
  $total += $sub;
?>
<div style="
display:flex;
justify-content:space-between;
background:#fff;
padding:15px;
margin:10px 0;
border-radius:12px;
box-shadow:0 8px 20px rgba(0,0,0,.12)">
  <div>
    <h4><?= $r['name'] ?></h4>
    <p><?= $r['quantity'] ?> × ₹<?= $r['price'] ?></p>
  </div>
  <strong>₹<?= $sub ?></strong>
</div>
<?php endwhile; ?>

<h3>Total: ₹<?= $total ?></h3>

<h3>Delivery Address</h3>
<p><?= $_SESSION['address'] ?></p>
<h3>Payment Method</h3>

<form action="place_order.php" method="POST">

<label>
  <input type="radio" name="payment_method" value="COD" checked>
  Cash on Delivery
</label><br><br>

<label>
  <input type="radio" name="payment_method" value="GPAY">
  GPay
</label><br><br>

<label>
  <input type="radio" name="payment_method" value="CARD">
  Credit / Debit Card
</label><br><br>

<button style="
display:block;
width:100%;
background:#ff9900;
padding:14px;
border:none;
border-radius:30px;
font-size:16px;
font-weight:bold;
cursor:pointer">
Place Order
</button>

</form>


