<?php
$conn = new mysqli("localhost", "root", "", "krushitsetu");

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

session_start();
?>
