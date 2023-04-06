<?php
session_start();
include('server.php');
$email = $_SESSION['email'];

$user_check_query = "SELECT * FROM seller_tb WHERE seller_email='$email' LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);
if(!isset($user)){
    header('location: index.php');
}


if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.php');
}

if (isset($_GET['logout'])) {
    unset($_SESSION['email']);
    session_destroy();
    header('location: index.php');
}

$seller_check = "SELECT * FROM seller_tb WHERE seller_email='$email' LIMIT 1";
$result = mysqli_query($conn, $seller_check);
$seller = mysqli_fetch_assoc($result);

$seller_id = $seller['seller_id'];
$seller_name = $seller['seller_name'];

/* $_SESSION['seller_name'] = $seller_name;
$_SESSION['seller_id'] = $seller_id; */



?>