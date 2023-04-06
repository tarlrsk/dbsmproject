<?php
session_start();
include('server.php');
include('verify_seller.php');

if (isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];
} else {
    header('location: my_vehicles.php');
}
if (isset($_GET['sold'])) {
    $update_appoint = "UPDATE car_tb SET car_status = 'sold' WHERE car_tb.car_id = '$car_id'"; //set
    mysqli_query($conn, $update_appoint);
    header('location: my_vehicles.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <!-- Bootstrap CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/8da23e008a.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid mx-5">
                <a class="navbar-brand" href="./seller_appointments_upcoming.php">
                    <img src="./img/WW Logo.png" width="35" class="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="./seller_appointments_upcoming.php">My Appointments</a>
                        <a class="nav-link nav-active-border" aria-current="page" href="./my_vehicles.php">My Vechicles</a>
                        <a class="nav-link" aria-current="page" href="./post_new_vehicle.php">Post a new vehicle</a>
                    </div>
                    <div class="navbar-nav ms-auto">
                        <div class="modal-header">
                            <?php if (isset($_SESSION['email'])) : ?>
                                <h5 class="modal-title" id="exampleModalLabel">
                                    <?php
                                    echo $_SESSION['email'];
                                    ?>
                                </h5>
                            <?php endif ?>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="./img/christian.jpg" class="profile-img rounded-circle" alt=""></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="./seller_account.php">Account</a>
                                <a class="dropdown-item" href="./seller_home.php?logout='1'">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <?php
    $select_stmt = $db->prepare("SELECT * FROM car_tb 
                                    INNER JOIN seller_tb 
                                    ON car_tb.seller_id = seller_tb.seller_id
                                    INNER JOIN seller_slot_tb
                                    ON seller_slot_tb.car_id = '$car_id'
                                    WHERE car_tb.seller_id = '$seller_id' 
                                    AND car_tb.car_id = '$car_id'");
    $select_stmt->execute();

    while ($info = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="container mt-4">
            <div class="row">
                <h3>My Vehicles</h3>
            </div>

            <div class="row">
                <div class="col-7">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="./img_vehicle/<?php echo $info['car_img'] ?>" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5 overflow-auto" style="height: 800px;">
                    <div class="">
                        <!-- <p class="mb-2 fs-6 text-end"><i class="fa-regular fa-heart fs-4"></i></p> -->
                    </div>
                    <div class="mb-4">
                        <h2 class=""><?php echo $info['car_brand'] . " " . $info['car_model'] ?></h2>
                        <h3 class="my-3 fw-bold"><span>฿</span> <?php echo number_format($info['car_price']) ?></h3>
                    </div>
                    <div>
                        <h4 class="text-uppercase">Specification</h4>
                        <hr>
                        <div class="row">
                            <div class="col text-center">
                                <h5>Year</h5>
                                <p><?php echo $info['car_year'] ?></p>
                            </div>
                            <div class="col text-center">
                                <h5>Seat Capacity</h5>
                                <p><?php echo number_format($info['car_seat']) ?></p>
                            </div>
                            <div class="col text-center">
                                <h5>Mileage</h5>
                                <p><?php echo number_format($info['car_mileage']) ?> km</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col text-center">
                                <h5>Gearbox</h5>
                                <p><?php echo $info['car_gear'] ?></p>
                            </div>
                            <div class="col text-center">
                                <h5>Engine Size</h5>
                                <p><?php echo number_format($info['car_engine']) ?> cc</p>
                            </div>
                            <div class="col text-center">
                                <h5>Fuel Type</h5>
                                <p><?php echo $info['car_fuel'] ?></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h5>Location</h5>
                        <p><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;<?php echo $info['car_location'] ?></p>
                        <h5>Listed on</h5>
                        <p>
                            <?php
                            $car_list_date = $info['car_list_date'];
                            $date = date_create("$car_list_date");
                            echo date_format($date, "F d, Y");
                            ?>
                        </p>
                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="text-uppercase mb-3">Description</h5>
                        <p>
                            <?php echo $info['car_des'] ?>
                        </p>
                    </div>
                    <div class="accordion" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Appointments
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <h5>Appointment #1</h5>
                                        <p class="mb-2">Date:
                                            <?php
                                            $seller_slot_date = $info['seller_slot_date'];
                                            $date = date_create("$seller_slot_date");
                                            echo date_format($date, "F d, Y");
                                            ?>
                                        </p>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-4">
                <div class="col text-center">
                    <button type="button" class="btn px-5 btn-primary" onclick="window.location='./my_vehicles.php';">Back</button>
                </div>
                <div class="col text-center">
                    <button type="button" class="btn px-5 text-white" style="background-color: #6E6A88;">Edit</button>
                </div>
                <div class="col text-center">
                    <button type="button" class="btn px-5 text-white" onclick="window.location='./my_vehicle_page.php?sold=1&car_id=<?php echo $info['car_id'] ?>';" style="background-color: red;">Sold</button>
                </div>
            </div>
        <?php } ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>