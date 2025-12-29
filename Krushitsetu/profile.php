<?php
include 'auth_check.php';
include 'config.php';

$id = $_SESSION['user_id'];
$user = $conn->query("SELECT * FROM users WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>My Profile</title>
<style>
body{font-family:Segoe UI;background:#f5f7f6}
.card{
background:#fff;
max-width:500px;
margin:40px auto;
padding:25px;
border-radius:20px;
box-shadow:0 10px 25px rgba(0,0,0,.15)
}
</style>
</head>

<body>

<div class="card">
<h2>👤 My Profile</h2>
<p><b>Name:</b> <?= $user['name'] ?></p>
<p><b>Email:</b> <?= $user['email'] ?></p>
<p><b>Contact:</b> <?= $user['contact'] ?></p>

<h3>📍 Address</h3>
<p>
<?= $user['flat_no'] ?>,<br>
<?= $user['area'] ?>,<br>
<?= $user['city'] ?> - <?= $user['pincode'] ?><br>
<?= $user['state'] ?>
</p>

<p><b>Role:</b> <?= ucfirst($user['role']) ?></p>

<a href="farmer_dashboard.php">⬅ Back to Dashboard</a>
</div>

</body>
</html>
