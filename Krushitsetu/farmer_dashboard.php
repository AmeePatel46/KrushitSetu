<?php
include 'auth_check.php';
include 'config.php';
include 'header.php';

if($_SESSION['role'] !== 'farmer'){
  die("Access denied");
}
?>

<?php if(isset($_GET['updated'])): ?>
<div style="background:#c8e6c9;padding:10px;border-radius:10px;margin:15px">
  ✅ Product updated successfully
</div>
<?php endif; ?>

<!DOCTYPE html>
<html>
<head>
<title>Farmer Dashboard</title>
<style>
body{font-family:Segoe UI;background:#f1f8e9;margin:0;padding:0}

/* Product card grid */
.products{
  display:grid;
  grid-template-columns:repeat(auto-fill,minmax(250px,1fr));
  gap:20px;
  padding:20px;
}

/* Each card equal size */
.card{
  background:white;
  padding:15px;
  border-radius:15px;
  box-shadow:0 4px 10px rgba(0,0,0,.15);
  text-align:center;
  transition:.3s;
}
.card:hover{transform:scale(1.02)}

/* Inputs */
form input, select{
  width:100%;
  padding:8px;
  margin-bottom:10px;
}

/* Buttons */
button{
  background:#2e7d32;
  color:#fff;
  border:none;
  padding:10px;
  width:100%;
  border-radius:8px;
}
.delete{
  color:red;
  font-weight:bold;
  display:block;
  margin-top:8px;
}
</style>
</head>
<body>

<!-- Add product form -->
<form action="add_product.php" method="POST" style="width:90%;max-width:400px;margin:auto;margin-top:20px;">
  <h2>➕ Add New Product</h2>

  <input name="name" placeholder="Product name" required>

  <select name="category" required>
    <option value="veg">Vegetable</option>
    <option value="fruit">Fruit</option>
    <option value="grain">Grain</option>
  </select>

  <input name="price" placeholder="₹ per kg" required>
  <input name="quantity" placeholder="Available kg" required>

  <button>Add Product</button>
</form>

<h2 style="margin:20px">🌾 My Products</h2>

<div class="products">

<?php
$fid = $_SESSION['user_id'];
$res = $conn->query("SELECT * FROM products WHERE farmer_id='$fid'");

while($p = $res->fetch_assoc()):
$img = "assets/".$p['category'].".jpg";
?>

<div class="card">
  <img src="<?= $p['image'] ?>" style="
width:100%;height:150px;object-fit:cover;border-radius:12px;margin-bottom:10px;">

  <h3><?= $p['name'] ?></h3>

  <form method="POST" action="update_product.php">
    <input type="hidden" name="id" value="<?= $p['id'] ?>">

    <label>Price (₹/kg)</label>
    <input type="number" name="price" value="<?= $p['price'] ?>">

    <label>Stock (kg)</label>
    <input type="number" name="quantity" value="<?= $p['quantity'] ?>">

    <button>Update</button>
    <a class="delete" href="delete_product.php?id=<?= $p['id'] ?>" onclick="return confirm('Delete product?')">🗑 Delete</a>
  </form>
</div>

<?php endwhile; ?>
</div>
</body>
</html>
