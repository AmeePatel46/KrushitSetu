<?php
include 'auth_check.php';
include 'config.php';
include 'product_images.php'; //  <-- Add this file include

$name = $_POST['name'];
$category = $_POST['category'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$farmer_id = $_SESSION['user_id'];
$image = getProductImage($name);

/* Save product */
$conn->query("
INSERT INTO products (name,category,price,quantity,image,farmer_id)
VALUES ('$name','$category','$price','$quantity','$image',{$_SESSION['user_id']})
");




/*  Auto image based on product name  */
$image_path = "assets/products/".$name.".jpg";

if(!file_exists($image_path)){   
    $image_path = "assets/products/default.jpg"; // if image not available
}

/* Insert product */
$sql = "INSERT INTO products (name, category, price, quantity, farmer_id, image)
        VALUES ('$name','$category',$price,$quantity,$farmer_id,'$image_path')";

if($conn->query($sql)){
    header("Location: farmer_dashboard.php?added=1");
    exit;
}else{
    echo "ERROR";
}
?>
