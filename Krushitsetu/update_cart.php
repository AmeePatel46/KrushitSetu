<?php
include 'auth_check.php';
include 'config.php';

$id = $_POST['id'];

if($_POST['action']=='inc'){
  $conn->query("UPDATE cart SET quantity=quantity+1 WHERE id=$id");
}
if($_POST['action']=='dec'){
  $conn->query("UPDATE cart SET quantity=GREATEST(quantity-1,1) WHERE id=$id");
}

header("Location: cart.php");
