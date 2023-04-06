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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/8da23e008a.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid mx-5">
                <a class="navbar-brand" href="./index.php">
                    <img src="./img/WW Logo.png" width="35" class="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="cars.php">Cars</a>
                        <a class="nav-link" href="#">Motorcycles</a>
                        <a class="nav-link" href="./buyer_appointments_upcoming.php">My Appointments</a>
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
                            <a href="#" class="nav-link dropdown-toggle" href="#" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false"><img src="./img/christian.jpg"
                                    class="profile-img rounded-circle" alt=""></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="./buyer_account.php">Account</a>
                                <a class="dropdown-item border-bottom" href="./my_wishlist.php">My Wishlist</a>
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
            <h3>Seller Profile</h3>
        </div>

        <!-- Car Detail Cards -->
        <div class="row my-3">
            <div class="card" style="width: 60rem;">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-3 text-center px-0">
                            <img src="./img/christian.jpg" class="rounded-circle" style="width:100px;" alt="">
                        </div>
                        <div class="col text-start px-0">
                            <h4 class="mt-2">Mr. Peter Parker</h4>
                            <h5 class="my-3"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;Bangkok, 10240
                            </h5>
                        </div>
                    </div>
                    <div class="row mt-4 mb-3">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link px-5" aria-current="page" href="./seller_profile.php">Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active px-5" href="./seller_profile_cars.php">Cars</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row my-3 text-center">
                        <div>
                            <div class="row my-4">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <img class="card-img-top" src="./img/car_four.jpg"
                                                        alt="Card image cap">
                                                </div>
                                                <div class="col">
                                                    <h4>Toyota GR Supra</h4>
                                                    <h5 class="text-muted">Toyota</h5>
                                                    <h5><span>฿</span> 256,000</h5>
                                                </div>

                                            </div>
                                            <div class="row my-3 text-center">
                                                <div class="col">
                                                    <h5 class="card-text">Year</h5>
                                                    <p class="fs-5">2022</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="card-text">Gear</h5>
                                                    <p class="fs-5">Automatic</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="card-text">Engine</h5>
                                                    <p class="fs-5">1,200 cc</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="card-text">Mileage</h5>
                                                    <p class="fs-5">1,200 km</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="fs-5">Listed on: June 23, 2022</p>
                                                </div>
                                                <div class="col-3 bg-primary text-center py-2 rounded">
                                                    <p class="text-white fs-5 my-auto" style="text-decoration: none;">
                                                        Sold</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <img class="card-img-top" src="./img/car_four.jpg"
                                                        alt="Card image cap">
                                                </div>
                                                <div class="col">
                                                    <h4>Toyota GR Supra</h4>
                                                    <h5 class="text-muted">Toyota</h5>
                                                    <h5><span>฿</span> 256,000</h5>
                                                </div>

                                            </div>
                                            <div class="row my-3 text-center">
                                                <div class="col">
                                                    <h5 class="card-text">Year</h5>
                                                    <p class="fs-5">2022</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="card-text">Gear</h5>
                                                    <p class="fs-5">Automatic</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="card-text">Engine</h5>
                                                    <p class="fs-5">1,200 cc</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="card-text">Mileage</h5>
                                                    <p class="fs-5">1,200 km</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="fs-5 my-auto">Listed on: June 23, 2022</p>
                                                </div>
                                                <div class="col-3 bg-success text-center py-2 rounded">
                                                    <a href="./vehicle-details.php"
                                                        class="text-white stretched-link fs-5 my-auto"
                                                        style="text-decoration: none;">Available</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-4">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <img class="card-img-top" src="./img/car_four.jpg"
                                                        alt="Card image cap">
                                                </div>
                                                <div class="col">
                                                    <h4>Toyota GR Supra</h4>
                                                    <h5 class="text-muted">Toyota</h5>
                                                    <h5><span>฿</span> 256,000</h5>
                                                </div>

                                            </div>
                                            <div class="row my-3 text-center">
                                                <div class="col">
                                                    <h5 class="card-text">Year</h5>
                                                    <p class="fs-5">2022</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="card-text">Gear</h5>
                                                    <p class="fs-5">Automatic</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="card-text">Engine</h5>
                                                    <p class="fs-5">1,200 cc</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="card-text">Mileage</h5>
                                                    <p class="fs-5">1,200 km</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="fs-5">Listed on: June 23, 2022</p>
                                                </div>
                                                <div class="col-3 bg-primary text-center py-2 rounded">
                                                    <p class="text-white fs-5 my-auto" style="text-decoration: none;">
                                                        Sold</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <img class="card-img-top" src="./img/car_four.jpg"
                                                        alt="Card image cap">
                                                </div>
                                                <div class="col">
                                                    <h4>Toyota GR Supra</h4>
                                                    <h5 class="text-muted">Toyota</h5>
                                                    <h5><span>฿</span> 256,000</h5>
                                                </div>

                                            </div>
                                            <div class="row my-3 text-center">
                                                <div class="col">
                                                    <h5 class="card-text">Year</h5>
                                                    <p class="fs-5">2022</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="card-text">Gear</h5>
                                                    <p class="fs-5">Automatic</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="card-text">Engine</h5>
                                                    <p class="fs-5">1,200 cc</p>
                                                </div>
                                                <div class="col">
                                                    <h5 class="card-text">Mileage</h5>
                                                    <p class="fs-5">1,200 km</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <p class="fs-5 my-auto">Listed on: June 23, 2022</p>
                                                </div>
                                                <div class="col-3 bg-success text-center py-2 rounded">
                                                    <a href="./vehicle-details.php"
                                                        class="text-white stretched-link fs-5 my-auto"
                                                        style="text-decoration: none;">Available</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn p btn-primary"
                                onclick="window.location='./vehicle-details.php';">Back</button>
                        </div>
                        <div class="col-2 text-end">
                            <!-- <button type="button" class="btn p btn-primary">Confirm</button> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>