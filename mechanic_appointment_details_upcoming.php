<?php
session_start();
include('server.php');
include('verify_mechanic.php');

if (isset($_GET['appoint_id'])) {
    $appoint_id = $_GET['appoint_id'];
} else {
    header('location: my_vehicles.php');
}

if (isset($_GET['completed'])) {
    $update_appoint = "UPDATE appoint_tb SET mechanic_status = '0' WHERE appoint_tb.appoint_id = '$appoint_id'"; //set
    mysqli_query($conn, $update_appoint);
    header('location: mechanic_appointments_upcoming.php');
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
                <a class="navbar-brand" href="./mechanic_appointments_upcoming.php">
                    <img src="./img/WW Logo.png" width="35" class="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link nav-active-border" href="./mechanic_appointments_upcoming.php">My
                            Appointments</a>
                        <a class="nav-link" href="./mechanic_create_appointment.php">Create Appointments</a>
                        <a class="nav-link" href="./mechanic_manage_appointment.php">Manage
                            Appointments</a>
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
                                <a class="dropdown-item" href="#">Account</a>
                                <a class="dropdown-item" href="./mechanic_appointments_upcoming.php?logout='1'">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <div class="row">
            <h3>Appointment Details</h3>
        </div>

        <!-- Car Detail Cards -->
        <?php
        $select_stmt = $db->prepare("SELECT * FROM appoint_tb
                                    INNER JOIN car_tb
                                    ON appoint_tb.car_id = car_tb.car_id
                                    INNER JOIN seller_tb
                                    ON appoint_tb.seller_id = seller_tb.seller_id
                                    INNER JOIN buyer_tb
                                    ON appoint_tb.buyer_id = buyer_tb.buyer_id
                                    INNER JOIN mechanic_slot_tb
                                    ON appoint_tb.mechanic_slot_id = mechanic_slot_tb.mechanic_slot_id
                                    WHERE appoint_tb.appoint_id= '$appoint_id'");
        $select_stmt->execute();

        //loop that show dataa of every row form database
        while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {

        ?>
            <div class="row my-3">
                <div class="card" style="width: 60rem;">
                    <div class="card-body">
                        <div class="row text-center">
                            <h5 class="">Appointment Date</h5>
                            <p class="fs-5">

                                <?php
                                $mechanic_slot_date = $row['mechanic_slot_date'];
                                $date = date_create("$mechanic_slot_date");
                                echo date_format($date, "F d, Y");
                                ?></p>
                            </p>
                        </div>
                        <div class="row my-3 text-center">
                            <div class="col">
                                <div class="row my-2">
                                    <h4>Customer</h4>
                                </div>
                                <div class="row my-3">
                                    <div class="col text-center px-0">
                                        <img src="./img/christian.jpg" class="rounded-circle" style="width:100px;" alt="">
                                    </div>
                                    <div class="col text-start px-0">
                                        <h4 class="mt-2"><?php echo $row['buyer_name'] ?></h4>
                                        <h5 class="my-3"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;<?php echo $row['car_location'] ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row text-start ms-5 mt-4">
                                    <h5 class="">Phone Number</h5>
                                    <p class="fs-5"><?php echo $row['buyer_phone'] ?></p>
                                    <h5 class="">Email Address</h5>
                                    <p class="fs-5"><?php echo $row['buyer_email'] ?></p>
                                    <h5 class="">Appointmenet Price</h5>
                                    <p class="fs-5"><?php echo number_format($row['mechanic_price']) ?> Baht</p>

                                </div>

                            </div>
                            <div class="col">
                                <div class="row">
                                    <h4>Seller and Vehicle Information</h4>
                                </div>
                                <div class="row my-2">
                                    <div class="col">
                                        <img class="card-img-top" src="./img_vehicle/<?php echo $row['car_img']; ?>" alt="Card image cap">
                                    </div>
                                </div>
                                <div class="row my-2 text-start">
                                    <div class="col">
                                        <h4><?php echo $row['car_brand'] ?> <?php echo $row['car_model'] ?></h4>
                                        <h5 class="text-muted"><?php echo $row['car_brand'] ?></h5>
                                        <h5></h5>
                                    </div>
                                    <div class="col text-end">
                                        <h4 class="fw-bold"><span>฿</span> <?php echo number_format($row['car_price']) ?></h4>
                                    </div>

                                </div>
                                <div class="row my-3">
                                    <div class="col-2">
                                        <img src="./img/christian.jpg" style="width:75px;" class="rounded-circle" alt="">
                                    </div>
                                    <div class="col">
                                        <h5 class="mt-2"><?php echo $row['seller_name'] ?></h5>
                                        <p><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;<?php echo $row['car_location'] ?></p>
                                    </div>
                                </div>
                                <div class="row my-2 text-center">
                                    <div class="row">
                                        <div class="col text-center">
                                            <h5>Year</h5>
                                            <p><?php echo $row['car_year'] ?></p>
                                        </div>
                                        <div class="col text-center">
                                            <h5>Seat Capacity</h5>
                                            <p><?php echo $row['car_seat'] ?></p>
                                        </div>
                                        <div class="col text-center">
                                            <h5>Mileage</h5>
                                            <p><?php echo number_format($row['car_mileage']) ?> km</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-center">
                                            <h5>Gearbox</h5>
                                            <p><?php echo $row['car_gear'] ?></p>
                                        </div>
                                        <div class="col text-center">
                                            <h5>Engine Size</h5>
                                            <p><?php echo number_format($row['car_engine']) ?> cc</p>
                                        </div>
                                        <div class="col text-center">
                                            <h5>Fuel Type</h5>
                                            <p><?php echo $row['car_fuel'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn p btn-primary" onclick="window.location='./mechanic_appointments_upcoming.php';">Back</button>
                            </div>
                            <div class="col-2 text-end">
                                <button type="button" class="btn p btn-primary" onclick="window.location='./mechanic_appointment_details_upcoming.php?completed=1&appoint_id=<?php echo $appoint_id ?>'">Completed</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>