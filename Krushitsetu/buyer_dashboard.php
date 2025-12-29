<?php
include 'auth_check.php';
include 'config.php';
include 'buyer_header.php';

if($_SESSION['role'] !== 'buyer'){
  die("Access denied");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Buyer Dashboard</title>
<style>
body{font-family:Segoe UI;background:#f5f7f6}

.grid{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
  gap:20px;
  padding:30px
}
.card{
  background:#fff;
  border-radius:20px;
  box-shadow:0 10px 25px rgba(0,0,0,.15);
  overflow:hidden;
  padding:15px
}
.card img{
  width:100%;
  height:150px;
  object-fit:cover;
  border-radius:15px
}
.card h3{margin:10px 0}
.qty{
  width:100%;
  padding:8px;
  margin:10px 0
}
.btns{
  display:flex;
  gap:10px
}
.btns button{
  flex:1;
  padding:8px;
  border:none;
  border-radius:20px;
  cursor:pointer
}
.cart{background:#ffc107}
.buy{background:#2e7d32;color:#fff}
/* PRODUCT CARD BUTTONS */
.cart-box{
  margin-top:10px;
  display:flex;
  justify-content:center;
}

.btn-cart{
  width:100%;
  background:#ff9f00;
  color:#000;
  border:none;
  padding:10px;
  border-radius:8px;
  font-weight:600;
  cursor:pointer;
}

.btn-buy{
  width:100%;
  margin-top:8px;
  background:#fb641b;
  color:#fff;
  border:none;
  padding:10px;
  border-radius:8px;
  font-weight:600;
  cursor:pointer;
}

/* AFTER ADD TO CART (➖ 1 ➕) */
.qty-box{
  display:flex;
  align-items:center;
  justify-content:space-between;
  background:#fff;
  border:1px solid #ddd;
  border-radius:8px;
  width:100%;
}

.qty-box button{
  background:none;
  border:none;
  font-size:18px;
  width:40px;
  cursor:pointer;
}

.qty-box span{
  font-weight:600;
}

</style>
</head>

<body>

<h2 style="padding:20px">🛒 Available Products</h2>

<div class="grid">

<?php
$buyer_city = $conn->query(
  "SELECT city FROM users WHERE id=".$_SESSION['user_id']
)->fetch_assoc()['city'];
/* Nearest farmers first */
$res = $conn->query("
SELECT products.*, users.name farmer, users.city
FROM products
JOIN users ON users.id = products.farmer_id
ORDER BY (users.city='$buyer_city') DESC
");

while($p = $res->fetch_assoc()):
$img = "assets/".$p['category'].".jpg";
?>

<div class="card">
  <img src="<?= $p['image'] ?>" style="
width:100%;height:150px;object-fit:cover;border-radius:12px;margin-bottom:10px;">


  <h3><?= $p['name'] ?></h3>
  <p>Farmer: <?= $p['farmer'] ?> (<?= $p['city'] ?>)</p>
 
  <p>Available: <?= $p['quantity'] ?> kg</p>

 <div class="product-card">
  
  <p>₹<?= $p['price'] ?>/kg</p>

  <!-- CART AREA (ONLY ONE PLACE) -->
  <div class="cart-box" id="cartBox<?= $p['id'] ?>">
    <button class="btn-cart" onclick="addToCart(<?= $p['id'] ?>)">
      Add to Cart
    </button>
  </div>

  <button class="btn-buy" onclick="buyNow(<?= $p['id'] ?>)">
    Buy Now
  </button>
</div>

  </form>
</div>

<?php endwhile; ?>

</div>
<script>
function inc(btn){
  let input = btn.previousElementSibling;
  input.value = parseInt(input.value) + 1;
}
function dec(btn){
  let input = btn.nextElementSibling;
  if(input.value > 1)
    input.value = parseInt(input.value) - 1;
}
</script>
<script>


function updateQty(pid,change){
  let qtyEl = document.getElementById('qty'+pid);
  let qty = parseInt(qtyEl.innerText) + change;

  if(qty < 1) return;

  fetch('update_cart.php',{
    method:'POST',
    body:new URLSearchParams({
      product_id:pid,
      quantity:qty
    })
  });

  qtyEl.innerText = qty;
}

function updateCartCount(){
  fetch('cart_count.php')
  .then(r=>r.text())
  .then(c=>{
    document.getElementById('cartCount').innerText = c;
  });
}

function addToCart(pid){
  fetch('add_to_cart.php',{
    method:'POST',
    body:new URLSearchParams({product_id:pid})
  })
  .then(r=>r.text())
  .then(res=>{
    if(res==='ADDED'){
      document.getElementById('cartBox'+pid).innerHTML = `
        <div class="qty-box">
          <button onclick="updateQty(${pid},-1)">➖</button>
          <span id="qty${pid}">1</span>
          <button onclick="updateQty(${pid},1)">➕</button>
        </div>
      `;
      updateCartCount();
    }
  });
}


</script>

<script>
function buyNow(pid){
  fetch('add_to_cart.php',{
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded'},
    body:'product_id='+pid
  })
  .then(()=>location.href='checkout.php');
}
</script>

</body>
</html>

