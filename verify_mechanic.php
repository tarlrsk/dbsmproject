<?php
session_start();
include('server.php');
$email = $_SESSION['email'];

$user_check_query = "SELECT * FROM mechanic_tb WHERE mechanic_email='$email' LIMIT 1";
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

$mechanic_check = "SELECT * FROM mechanic_tb WHERE mechanic_email='$email' LIMIT 1";
$result = mysqli_query($conn, $mechanic_check);
$mechanic = mysqli_fetch_assoc($result);

$mechanic_id = $mechanic['mechanic_id'];
$mechanic_name = $mechanic['mechanic_name'];

?>