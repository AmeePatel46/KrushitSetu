<?php
// Always protect buyer pages
include 'auth_check.php';
include 'config.php';

// Logged-in buyer id
$buyer_id = $_SESSION['user_id'];

// Cart count (safe)
$res = $conn->query("SELECT COUNT(*) AS c FROM cart WHERE buyer_id = $buyer_id");
$row = $res->fetch_assoc();
$cart_count = $row['c'] ?? 0;

// Current page (for active menu)
$page = basename($_SERVER['PHP_SELF']);
?>

<style>
.buyer-header a{
  color:white;
  text-decoration:none;
  font-weight:600;
}
.buyer-header a:hover{
  opacity:.85;
}
.buyer-header .active{
  border-bottom:3px solid #00e676;
  padding-bottom:4px;
}
.cart-badge{
  background:red;
  color:white;
  font-size:12px;
  padding:2px 6px;
  border-radius:50%;
  margin-left:4px;
}
</style>

<header class="buyer-header" style="
display:flex;
justify-content:space-between;
align-items:center;
background:#1b5e20;
color:#fff;
padding:12px 30px;
position:sticky;
top:0;
z-index:1000">

  <!-- LEFT : LOGO -->
  <div style="display:flex;align-items:center;gap:10px">
    <img src="K.jpg" style="width:172px;height:88px;">
  
  </div>

  <!-- RIGHT : NAV -->
  <nav style="display:flex;align-items:center;gap:25px;font-size:16px">
  <strong>Buyer</strong>
    <a href="index.php" class="<?= $page=='index.php'?'active':'' ?>">Home</a>

    <!-- categories are on index page -->
    

    <a href="buyer_dashboard.php" class="<?= $page=='buyer_dashboard.php'?'active':'' ?>">Shop</a>

<a href="subscription.php"> Subscription</a>

    <a href="orders.php" class="<?= $page=='orders.php'?'active':'' ?>">Tracking</a>

    <a href="cart.php" class="<?= $page=='cart.php'?'active':'' ?>">
      🛒 <span id="cartCount"><?= $cart_count ?></span>

    </a>

    <a href="profile.php" class="<?= $page=='profile.php'?'active':'' ?>">👤</a>

       <a href="logout.php" style="
      background:#fff;
      color:#1b5e20;
      padding:6px 14px;
      border-radius:20px;
      text-decoration:none;
      font-weight:600">Logout</a>

  </nav>
</header>
<?php
$progress = [
  "PLACED"=>25,
  "PACKED"=>50,
  "SHIPPED"=>75,
  "DELIVERED"=>100
][$o['status']];
?>

<div style="background:#ddd;height:7px;border-radius:10px;width:100%">
  <div style="height:7px;background:green;border-radius:10px;width:<?= $progress ?>%"></div>
</div>
<p>Status: <b><?= $o['status'] ?></b></p>
