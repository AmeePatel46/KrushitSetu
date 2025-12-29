<?php
session_start();
include 'config.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows !== 1){
  echo "INVALID_EMAIL";
  exit;
}

$user = $result->fetch_assoc();

if (password_verify($password, $user['password'])) {

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['name']    = $user['name'];
    $_SESSION['role']    = $user['role'];

    // 🔥 ROLE BASED RESPONSE
    if ($user['role'] === 'farmer') {
        echo "FARMER";
    } else {
        echo "BUYER";
    }

} else {
    echo "INVALID_PASSWORD";
}