<?php
    session_start();
    include('server.php');

    $email = $_SESSION['email'];

    date_default_timezone_set('Asia/Bangkok');
    $date = date("Y-m-d");

    //random number
    $numrand = (mt_rand());

    //add file
    $upload = $_FILES['formFile'];
    if ($upload != '') {
        //choose the path where to upload
        $path = "img_vehicle/";

        //cut the old name off
        $type = strrchr($_FILES['formFile']['name'], ".'");

        //new name
        $newname = $date . $numrand . $type;
        $path_copy = $path . $newname;

        //upload to server
        move_uploaded_file($_FILES['formFile']['tmp_name'], $path_copy);
    }

    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $mileage = $_POST['mileage'];
    $location = $_POST['location'];
    $seat = $_POST['seat'];
    $gear = $_POST['gear'];
    $engine = $_POST['engine'];
    $fuel = $_POST['fuel'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $seller_slot_date = $_POST['appointment_date'];


    $seller_check = "SELECT * FROM seller_tb WHERE seller_email='$email' LIMIT 1";
    $result = mysqli_query($conn, $seller_check);
    $seller = mysqli_fetch_assoc($result);

    $seller_id = $seller['seller_id'];

    //INSERT new vehicle into car_tb
    $sql = "INSERT INTO car_tb (car_img, car_brand, car_model, car_year, car_mileage, car_location, car_seat, car_gear, car_engine, car_fuel, car_price, car_des, seller_id, car_status, car_list_date) 
            VALUES('$newname', '$brand' , '$model','$year', '$mileage', '$location', '$seat', '$gear', '$engine', '$fuel' ,'$price','$description', '$seller_id', 'available' , '$date')";
    $result = mysqli_query($conn, $sql) or die("ERROR in query: $sql " . mysqli_error($conn, $sql));


    //check the car_id
    $car_id_check = "SELECT car_id FROM car_tb WHERE car_img = '$newname' LIMIT 1"; 
    $result = mysqli_query($conn, $car_id_check);
    $car = mysqli_fetch_assoc($result);

    $car_id = $car['car_id'];

    //INSERT new appointment into seller_slot_tb
    $sql = "INSERT INTO seller_slot_tb (seller_slot_date, seller_slot_status, seller_id, car_id) 
            VALUES ('$seller_slot_date', '1', '$seller_id', '$car_id');";
    $result = mysqli_query($conn, $sql) or die("ERROR in query: $sql " . mysqli_error($conn, $sql));

    header('location: my_vehicles.php');
