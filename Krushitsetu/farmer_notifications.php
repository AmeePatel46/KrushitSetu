<?php
include 'auth_check.php';
include 'config.php';

$fid = $_SESSION['user_id'];

$res = $conn->query("
   SELECT * FROM notifications
   WHERE user_id=$fid ORDER BY id DESC
");

$conn->query("UPDATE notifications SET seen=1 WHERE user_id=$fid");
?>

<h2 style="margin:20px">📩 Notifications</h2>

<?php if($res->num_rows==0): ?>
<p style="margin:20px;color:#777">No notifications yet</p>
<?php endif; ?>

<?php while($n=$res->fetch_assoc()): ?>
<div style="
background:white;
margin:15px;
padding:15px;
border-radius:12px;
box-shadow:0 4px 12px rgba(0,0,0,.1)">
  <b><?= $n['message'] ?></b><br>
  <span style="font-size:13px;color:#555">📅 <?= $n['created_at'] ?></span>
</div>
<?php endwhile; ?>
