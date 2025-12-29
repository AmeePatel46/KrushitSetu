<?php
include 'config.php';

$email = $_POST['email'] ?? '';
$otp   = $_POST['otp'] ?? '';

$res = $conn->query(
  "SELECT * FROM otp_verification
   WHERE email='$email'
   AND otp='$otp'
   AND expires_at >= NOW()"
);

if($res->num_rows > 0){
  $conn->query("DELETE FROM otp_verification WHERE email='$email'");
  echo "VERIFIED";
}else{
  echo "INVALID";
}
