<header style="
display:flex;
justify-content:space-between;
align-items:center;
background:#1b5e20;
color:#fff;
padding:12px 30px;
position:sticky;
top:0;
z-index:1000">

  <div style="display:flex;align-items:center;gap:10px">
   <img src="K.jpg" style="width:172px;height:88px;">
   
  </div>

  <nav style="display:flex;gap:20px;align-items:center"> <strong>Farmer</strong>
    <a href="index.php" style="color:white;text-decoration:none"><strong>Home</strong></a>

    <?php if($_SESSION['role']=='farmer'): ?>
     
      <a href="buyer_dashboard.php" style="color:white;text-decoration:none"></a>
    <?php endif; ?>
<?php
$count = $conn->query(
 "SELECT COUNT(*) c FROM notifications 
  WHERE user_id=".$_SESSION['user_id']." AND seen=0"
)->fetch_assoc()['c'];
?>



<a href="farmer_orders.php" style="color:white;text-decoration:none"><strong>Orders</strong></a>
<a href="farmer_notifications.php" >🔔</a>

   

    <a href="profile.php" style="color:white;text-decoration:none">👤</a>

    <a href="logout.php" style="
      background:#fff;
      color:#1b5e20;
      padding:6px 14px;
      border-radius:20px;
      text-decoration:none;
      font-weight:600">Logout</a>
  </nav>

</header>
