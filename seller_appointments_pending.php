<?php
session_start();
include('server.php');
include('verify_seller.php')
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
                        <a class="nav-link nav-active-border" href="./seller_appointments_upcoming.php">My Appointments</a>
                        <a class="nav-link" aria-current="page" href="./my_vehicles.php">My Vechicles</a>
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

    <div class="container mt-4">
        <div class="row">
            <h3>My Appointments</h3>
        </div>
        <div class="row mt-4 mb-3">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link px-5" aria-current="page" href="./seller_appointments_upcoming.php">Upcoming</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active px-5" href="./seller_appointments_pending.php">Pending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-5" href="./seller_appointments_completed.php">Completed</a>
                </li>
            </ul>
        </div>
        <!-- Car Detail Cards -->
        <div class="row my-3">
            <div class="card" style="width: 60rem;">
                <div class="card-body">
                    <div class="row my-3 text-center">
                        <div class="col">
                            <h5 class="card-text">Date</h5>
                            <p class="fs-5">Monday, 27 September, 2022</p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Time</h5>
                            <p class="fs-5">15:00 PM</p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Client</h5>
                            <p class="fs-5">Pedro Martinez</>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-4">
                            <img class="card-img-top" src="./img/car_four.jpg" alt="Card image cap">
                        </div>
                        <div class="col">
                            <h4>Toyota GR Supra</h4>
                            <h5 class="text-muted">Toyota</h5>
                            <div class="row my-3 text-center">
                                <div class="col">
                                    <h5 class="card-text">Year</h5>
                                    <p class="fs-5">2022</p>
                                </div>
                                <div class="col">
                                    <h5 class="card-text">Transmission</h5>
                                    <p class="fs-5">Automatic</p>
                                </div>
                                <div class="col">
                                    <h5 class="card-text">Price</h5>
                                    <p class="fs-5">250,000 THB
                                        <p />
                                </div>
                            </div>
                            <div class="row text-end">
                                <div class="col">

                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn p btn-primary" onclick="window.location='./appointment_details_pending.php';">View <span><i class="fa-solid fa-arrow-right"></i></span></button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="row my-3">
            <div class="card" style="width: 60rem;">
                <div class="card-body">
                    <div class="row my-3 text-center">
                        <div class="col">
                            <h5 class="card-text">Date</h5>
                            <p class="fs-5">Monday, 27 September, 2022</p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Time</h5>
                            <p class="fs-5">15:00 PM</p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Client</h5>
                            <p class="fs-5">Pedro Martinez</>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-4">
                            <img class="card-img-top" src="./img/car_four.jpg" alt="Card image cap">
                        </div>
                        <div class="col">
                            <h4>Toyota GR Supra</h4>
                            <h5 class="text-muted">Toyota</h5>
                            <div class="row my-3 text-center">
                                <div class="col">
                                    <h5 class="card-text">Year</h5>
                                    <p class="fs-5">2022</p>
                                </div>
                                <div class="col">
                                    <h5 class="card-text">Transmission</h5>
                                    <p class="fs-5">Automatic</p>
                                </div>
                                <div class="col">
                                    <h5 class="card-text">Price</h5>
                                    <p class="fs-5">250,000 THB
                                        <p />
                                </div>
                            </div>
                            <div class="row text-end">
                                <div class="col">

                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn p btn-primary" onclick="window.location='./appointment_details_pending.php';">View <span><i class="fa-solid fa-arrow-right"></i></span></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row my-3">
            <div class="card" style="width: 60rem;">
                <div class="card-body">
                    <div class="row my-3 text-center">
                        <div class="col">
                            <h5 class="card-text">Date</h5>
                            <p class="fs-5">Monday, 27 September, 2022</p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Time</h5>
                            <p class="fs-5">15:00 PM</p>
                        </div>
                        <div class="col">
                            <h5 class="card-text">Client</h5>
                            <p class="fs-5">Pedro Martinez</>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-4">
                            <img class="card-img-top" src="./img/car_four.jpg" alt="Card image cap">
                        </div>
                        <div class="col">
                            <h4>Toyota GR Supra</h4>
                            <h5 class="text-muted">Toyota</h5>
                            <div class="row my-3 text-center">
                                <div class="col">
                                    <h5 class="card-text">Year</h5>
                                    <p class="fs-5">2022</p>
                                </div>
                                <div class="col">
                                    <h5 class="card-text">Transmission</h5>
                                    <p class="fs-5">Automatic</p>
                                </div>
                                <div class="col">
                                    <h5 class="card-text">Price</h5>
                                    <p class="fs-5">250,000 THB
                                        <p />
                                </div>
                            </div>
                            <div class="row text-end">
                                <div class="col">

                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn p btn-primary" onclick="window.location='./appointment_details_pending.php';">View <span><i class="fa-solid fa-arrow-right"></i></span></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>