<?php
include 'config.php';

$email = $_POST['email'] ?? '';

if(!$email){
  exit("EMAIL_REQUIRED");
}

$otp = rand(100000,999999);
$expires = date("Y-m-d H:i:s", strtotime("+5 minutes"));

$conn->query("DELETE FROM otp_verification WHERE email='$email'");
$conn->query(
  "INSERT INTO otp_verification (email, otp, expires_at)
   VALUES ('$email','$otp','$expires')"
);

/* SIMPLE EMAIL OTP */
$subject = "KrushitSetu OTP Verification";
$message = "Your OTP is: $otp\nValid for 5 minutes.";
$headers = "From: no-reply@krushitsetu.com";

mail($email, $subject, $message, $headers);

/* DEVELOPMENT MODE OTP */
echo "OTP:$otp";

