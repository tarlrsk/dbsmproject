<?php
session_start();
include('server.php');
$email = $_SESSION['email'];

$user_check_query = "SELECT * FROM buyer_tb WHERE buyer_email='$email' LIMIT 1";
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

$buyer_check = "SELECT * FROM buyer_tb WHERE buyer_email='$email' LIMIT 1";
$result = mysqli_query($conn, $buyer_check);
$mechanic = mysqli_fetch_assoc($result);

$buyer_id = $mechanic['buyer_id'];
$buyer_name = $mechanic['buyer_name'];

?>