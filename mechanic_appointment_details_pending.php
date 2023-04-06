<?php
session_start();
include('server.php');
include('verify_mechanic.php')
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
                                <a class="dropdown-item" href="./mechanic_appointment_details_upcoming.php?logout='1'">Logout</a>
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
        <div class="row my-3">
            <div class="card" style="width: 60rem;">
                <div class="card-body">
                    <div class="row text-center">
                        <h5 class="">Appointment Date & Time</h5>
                        <p class="fs-5">Monday 27 September, 2022 -- 5:00pm </p>
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
                                    <h4 class="mt-2">Mr. Peter Parker</h4>
                                    <h5 class="my-3"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;Bangkok, 10240
                                    </h5>
                                </div>
                            </div>
                            <div class="row text-start ms-5 mt-4">
                                <h5 class="">Phone Number</h5>
                                <p class="fs-5">0673857292</p>
                                <h5 class="">Email Address</h5>
                                <p class="fs-5">mr.peterparker@gmail.com</p>
                                <h5 class="">Appointmenet Price</h5>
                                <p class="fs-5">1,500 Baht</p>

                            </div>

                        </div>
                        <div class="col">
                            <div class="row">
                                <h4>Seller and Vehicle Information</h4>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <img class="card-img-top" src="./img/car_four.jpg" alt="Card image cap">
                                </div>
                            </div>
                            <div class="row my-2 text-start">
                                <div class="col">
                                    <h4>Toyota GR Supra</h4>
                                    <h5 class="text-muted">Toyota</h5>
                                    <h5></h5>
                                </div>
                                <div class="col text-end">
                                    <h4 class="fw-bold"><span>฿</span> 500,000</h4>
                                </div>

                            </div>
                            <div class="row my-3">
                                <div class="col-2">
                                    <img src="./img/christian.jpg" style="width:75px;" class="rounded-circle" alt="">
                                </div>
                                <div class="col">
                                    <h5 class="mt-2">Mr. Michel Wong</h5>
                                    <p><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;Bangkok, 10240</p>
                                </div>
                            </div>
                            <div class="row my-2 text-center">
                                <div class="row">
                                    <div class="col text-center">
                                        <h5>Year</h5>
                                        <p>2018</p>
                                    </div>
                                    <div class="col text-center">
                                        <h5>Seat Capacity</h5>
                                        <p>4</p>
                                    </div>
                                    <div class="col text-center">
                                        <h5>Mileage</h5>
                                        <p>3,000 km</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <h5>Gearbox</h5>
                                        <p>Automatic</p>
                                    </div>
                                    <div class="col text-center">
                                        <h5>Engine Size</h5>
                                        <p>3,000 cc</p>
                                    </div>
                                    <div class="col text-center">
                                        <h5>Fuel Type</h5>
                                        <p>Disel</p>
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
                            <button type="button" class="btn p btn-primary">Comfirm</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>