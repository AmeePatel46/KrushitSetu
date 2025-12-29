<?php
include 'auth_check.php';
include 'config.php';

$id = $_GET['id'];
$fid = $_SESSION['user_id'];

$p = $conn->query(
  "SELECT * FROM products WHERE id=$id AND farmer_id=$fid"
)->fetch_assoc();

if(!$p) die("Access denied");
?>

<form method="POST" action="update_product.php" style="
max-width:400px;
margin:50px auto;
background:#fff;
padding:30px;
border-radius:20px">

<h2>Edit Product</h2>

<input type="hidden" name="id" value="<?= $p['id'] ?>">

<label>Price (₹/kg)</label>
<input name="price" value="<?= $p['price'] ?>" required>

<label>Available kg</label>
<input name="quantity" value="<?= $p['quantity'] ?>" required>

<button>Update</button>
</form>
