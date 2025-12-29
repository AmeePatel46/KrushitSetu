<?php
include 'auth_check.php';
include 'config.php';

if($_SESSION['role'] != 'buyer') die("Unauthorized");

// Fetch all products for dropdown
$products = $conn->query("SELECT id,name,price FROM products");
?>

<!DOCTYPE html>
<html>
<head>
<title>Subscription Plan</title>
<style>
body{font-family:Segoe UI;background:#f6fff3;padding:30px}
form{
  width:420px;background:white;padding:25px;border-radius:12px;
  margin:auto;box-shadow:0 4px 18px rgba(0,0,0,.2)
}
input,select{width:100%;padding:10px;margin:8px 0;border:1px solid #ccc;border-radius:10px}
button{
  background:#2e7d32;color:#fff;padding:10px;width:100%;
  border:none;font-size:17px;border-radius:20px;cursor:pointer
}
</style>
</head>
<body>

<h2 align="center">📦 Create Weekly/Monthly Subscription</h2><br>

<form action="subscription_save.php" method="POST">

<label>Choose Product</label>
<select name="product_id" required>
<?php while($p=$products->fetch_assoc()): ?>
  <option value="<?= $p['id'] ?>"><?= $p['name'] ?> (₹<?= $p['price'] ?>/kg)</option>
<?php endwhile; ?>
</select>

<label>Subscription Type</label>
<select name="type" required>
  <option value="WEEKLY">Weekly</option>
  <option value="MONTHLY">Monthly</option>
</select>

<label>Quantity per delivery (kg)</label>
<input type="number" name="qty" required min="1">

<label>Duration</label>
<select name="duration">
  <option value="2">2 Weeks / Months</option>
  <option value="4">4 Weeks / Months</option>
  <option value="8">8 Weeks / Months</option>
</select>

<button type="submit">Start Subscription</button>
</form>

</body>
</html>
