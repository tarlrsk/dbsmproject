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
    <!-- Popperjs -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <!-- Tempus Dominus JavaScript -->
    <script src="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/js/tempus-dominus.js" crossorigin="anonymous"></script>

    <!-- Tempus Dominus Styles -->
    <link href="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid mx-5">
                <a class="navbar-brand" href="./index.php">
                    <img src="./img/WW Logo.png" width="35" class="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a href="#" class="nav-link dropdown-toggle" href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="./img/christian.jpg" class="profile-img rounded-circle" alt=""></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="./buyer_account.php">Account</a>
                                <a class="dropdown-item border-bottom" href="./my_wishlist.php">My Wishlist</a>
                                <a class="dropdown-item" href="./cars.php?logout='1'">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <div class="col-9">
            <div class="row">
                <h2>My Wishlist</h2>
            </div>
            <div>
                <div class="row my-3">
                    <div class="col">
                        <div class="card" style="cursor: pointer;" onclick="window.location='./vehicle-details.php';">
                            <img src="./img/car_one.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Toyota Hilux</h5>
                                <h6 class="text-secondary">Toyota</h6>
                                <div class="row">
                                    <div class="col text-center">
                                        <h6 class="mb-2">Year</h6>
                                        <p>2019</p>
                                    </div>
                                    <div class="col text-center">
                                        <h6 class="mb-2">Engine</h6>
                                        <p>1,200 cc</p>
                                    </div>
                                    <div class="col text-center">
                                        <h6 class="mb-2">Mileage</h6>
                                        <p>1,200 km</p>
                                    </div>
                                    <div class="col text-center">
                                        <h6 class="mb-2">Gear</h6>
                                        <p>Auto</p>
                                    </div>
                                </div>
                                <div class="row mx-3">
                                    <div class="col text-start">
                                        <i class="fa-solid fa-eye"></i>
                                        <span>500</span>
                                    </div>
                                    <div class="col text-end">
                                        <h4><span>฿</span> 256,000</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: auto;">
                            <img src="./img/car_four.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Mercedes-Benz</h5>
                                <h6 class="text-secondary">Mercedes</h6>
                                <div class="row">
                                    <div class="col text-center">
                                        <h6 class="mb-2">Year</h6>
                                        <p>2013</p>
                                    </div>
                                    <div class="col text-center">
                                        <h6 class="mb-2">Engine</h6>
                                        <p>1,500 cc</p>
                                    </div>
                                    <div class="col text-center">
                                        <h6 class="mb-2">Mileage</h6>
                                        <p>5,000 km</p>
                                    </div>
                                    <div class="col text-center">
                                        <h6 class="mb-2">Gear</h6>
                                        <p>Auto</p>
                                    </div>
                                </div>
                                <div class="row mx-3">
                                    <div class="col text-start">
                                        <i class="fa-solid fa-eye"></i>
                                        <span>700</span>
                                    </div>
                                    <div class="col text-end">
                                        <h4><span>฿</span> 979,000</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col">
                        <div class="card" style="cursor: pointer;" onclick="window.location='./vehicle-details.php';">
                            <img src="./img/car_one.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Toyota Hilux</h5>
                                <h6 class="text-secondary">Toyota</h6>
                                <div class="row">
                                    <div class="col text-center">
                                        <h6 class="mb-2">Year</h6>
                                        <p>2019</p>
                                    </div>
                                    <div class="col text-center">
                                        <h6 class="mb-2">Engine</h6>
                                        <p>1,200 cc</p>
                                    </div>
                                    <div class="col text-center">
                                        <h6 class="mb-2">Mileage</h6>
                                        <p>1,200 km</p>
                                    </div>
                                    <div class="col text-center">
                                        <h6 class="mb-2">Gear</h6>
                                        <p>Auto</p>
                                    </div>
                                </div>
                                <div class="row mx-3">
                                    <div class="col text-start">
                                        <i class="fa-solid fa-eye"></i>
                                        <span>500</span>
                                    </div>
                                    <div class="col text-end">
                                        <h4><span>฿</span> 256,000</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: auto;">
                            <img src="./img/car_four.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Mercedes-Benz</h5>
                                <h6 class="text-secondary">Mercedes</h6>
                                <div class="row">
                                    <div class="col text-center">
                                        <h6 class="mb-2">Year</h6>
                                        <p>2013</p>
                                    </div>
                                    <div class="col text-center">
                                        <h6 class="mb-2">Engine</h6>
                                        <p>1,500 cc</p>
                                    </div>
                                    <div class="col text-center">
                                        <h6 class="mb-2">Mileage</h6>
                                        <p>5,000 km</p>
                                    </div>
                                    <div class="col text-center">
                                        <h6 class="mb-2">Gear</h6>
                                        <p>Auto</p>
                                    </div>
                                </div>
                                <div class="row mx-3">
                                    <div class="col text-start">
                                        <i class="fa-solid fa-eye"></i>
                                        <span>700</span>
                                    </div>
                                    <div class="col text-end">
                                        <h4><span>฿</span> 979,000</h4>
                                    </div>
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