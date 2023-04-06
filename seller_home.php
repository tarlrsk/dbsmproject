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
                <a class="navbar-brand" href="./seller_home.php">
                    <img src="./img/WW Logo.png" width="35" class="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="./seller_appointments_upcoming.php">My Appointments</a>
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
                                <a class="dropdown-item border-bottom" href="#">Link</a>
                                <a class="dropdown-item" href="seller_home.php?logout='1'">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <div class="row my-3">
            <h3>Welcome Back, Mr. Johnny!</h3>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="card mx-auto" style="width: 20rem; border: none; cursor: pointer;" onclick="window.location='./seller_appointments_upcoming.php';">
                    <div class="card-body rounded-3 text-center confirmation-box-bg">
                        <div class="row my-2">
                            <i class="fs-1 text-white fa-solid fa-calendar-days"></i>
                        </div>
                        <div class="row mt-4">
                            <h6 class="text-white">Manage My Appointments</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mx-auto" style="width: 20rem; border: none; cursor: pointer;" onclick="window.location='./my_vehicles.php';">
                    <div class="card-body rounded-3 text-center confirmation-box-bg">
                        <div class="row my-2">
                            <i class="fs-1 text-white fa-solid fa-clipboard-list"></i>
                        </div>
                        <div class="row mt-4">
                            <h6 class="text-white">My Listed Cars</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mx-auto" style="width: 20rem; border: none; cursor: pointer;" onclick="window.location='./post_new_vehicle.php';">
                    <div class="card-body rounded-3 text-center confirmation-box-bg">
                        <div class="row my-2">
                            <i class="fs-1 text-white fa-solid fa-cloud-arrow-up"></i>
                        </div>
                        <div class="row mt-4">
                            <h6 class="text-white">Post new vehicle</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>