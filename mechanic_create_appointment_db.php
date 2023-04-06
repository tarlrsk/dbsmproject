<?php
session_start();
include('server.php');
include('verify_mechanic.php');


$price = $_POST['consult_price'];
$date = $_POST['mechanic_slot_date'];
echo $mechanic_id . " ";

echo $price ." ";
echo $date;

$query = "INSERT INTO mechanic_slot_tb (mechanic_slot_date, mechanic_slot_status, mechanic_id, mechanic_price)
        VALUES ('$date', '1', '$mechanic_id', '$price')";
mysqli_query($conn, $query);

header('location: mechanic_manage_appointment.php');