
<?php


session_start();
include 'config.php';

$role     = $_POST['role'];
$name     = $_POST['name'];
$email    = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$contact  = $_POST['contact'];

$flat_no  = $_POST['flat_no'];
$area     = $_POST['area'];
$city     = $_POST['city'];
$state    = $_POST['state'];
$pincode  = $_POST['pincode'];

$is_organic = $_POST['is_organic'] ?? 0;
$certificate = null;

if ($role === 'farmer' && $is_organic == 1 && isset($_FILES['certificate'])) {
    if (!is_dir("uploads")) mkdir("uploads");
    $certificate = "uploads/" . time() . "_" . $_FILES['certificate']['name'];
    move_uploaded_file($_FILES['certificate']['tmp_name'], $certificate);
}

$sql = "INSERT INTO users 
(role, name, email, password, contact, flat_no, area, city, state, pincode, is_organic, certificate)
VALUES 
('$role','$name','$email','$password','$contact',
 '$flat_no','$area','$city','$state','$pincode',
 '$is_organic','$certificate')";

if ($conn->query($sql)) {
    echo "REGISTERED";
} else {
    echo "ERROR: " . $conn->error;
}
