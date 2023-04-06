<?php

session_start();
include('server.php');
include('verify_buyer.php');

$email = $_SESSION['email'];

$car_id = $_GET['car_id'];
$seller_id = $_GET['seller_id'];
$mechanic_advise = $_GET['mechanic_advise'];
$date = $_GET['date'];
$mechanic_id = $_GET['mechanic_id'];
$mechanic_slot = $_GET['mechanic_slot'];

$user_check_query = "SELECT * FROM buyer_tb WHERE buyer_email='$email' LIMIT 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);

$buyer_id = $user['buyer_id'];

$car_info = "SELECT * FROM car_tb 
                INNER JOIN seller_tb 
                ON car_tb.seller_id = seller_tb.seller_id
                INNER JOIN seller_slot_tb
                ON seller_slot_tb.car_id = '$car_id'
                WHERE car_tb.car_id = '$car_id'";
$result = mysqli_query($conn, $car_info);
$car = mysqli_fetch_assoc($result);

if ($mechanic_advise == '1') {
    $sql =  "INSERT INTO appoint_tb (appoint_id, appoint_date, car_id, seller_id, mechanic_id, buyer_id, seller_status, mechanic_status, buyer_status, mechanic_advise, mechanic_slot_id, appoint_status) 
            VALUES (NULL, '$date', '$car_id', '$seller_id', '$mechanic_id', '$buyer_id', '1', '1', '1', '1', '$mechanic_slot', '1');";



    $update_slot = "UPDATE mechanic_slot_tb SET mechanic_slot_status = '0' WHERE mechanic_slot_tb.mechanic_slot_id = '$mechanic_slot'";

    $result = mysqli_query($conn, $update_slot) or die("ERROR in query: $sql " . mysqli_error($conn, $sql));
} else {
    $sql =  "INSERT INTO appoint_tb (appoint_id, appoint_date, car_id, seller_id, mechanic_id, buyer_id, seller_status, mechanic_status, buyer_status, mechanic_advise, mechanic_slot_id, appoint_status) 
            VALUES (NULL, '$date', '$car_id', '$seller_id', NULL, '$buyer_id', '1', '0', '1', '0', NULL, '1');";
}
echo "sdaskjdl";

$result = mysqli_query($conn, $sql) or die("ERROR in query: $sql " . mysqli_error($conn, $sql));

header('location: cars.php');
