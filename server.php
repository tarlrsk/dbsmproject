<?php

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "ww_project";

// connect to the database
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name); 

if (!$conn ) {
  die("Connection failed: " . mysqli_connect_error());
}

// another connect with PDO

try {
  $db = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
  $$e->getMessage();
}

$email    = "";
$errors = array(); 

