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

    <div class="container mt-4">
        <div class="row">
            <h3>My Vehicles</h3>
        </div>

        <div class="row">
            <div class="col-7">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators" style="margin-bottom:-20px;">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="width: 100px;"><img src="./img/car_one.jpg" class="d-block w-100 shadow-1-strong rounded" alt=""></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2" style="width: 100px;"><img src="./img/car_two.jpg" class="d-block w-100 shadow-1-strong rounded" alt=""></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3" style="width: 100px;"><img src="./img/car_three.jpg" class="d-block w-100 shadow-1-strong rounded" alt=""></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./img/car_one.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/car_two.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/car_three.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-5 overflow-auto" style="height: 800px;">
                <div class="">
                    <!-- <p class="mb-2 fs-6 text-end"><i class="fa-regular fa-heart fs-4"></i></p> -->
                </div>
                <div class="mb-4">
                    <h2 class="">Ford Teritory</h2>
                    <h3 class="my-3 fw-bold"><span>฿</span> 500,000</h3>
                </div>
                <div>
                    <h4 class="text-uppercase">Specification</h4>
                    <hr>
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
                    <hr>
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
                <hr>
                <div class="row">
                    <h5>Location</h5>
                    <p><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;Bangkok, 10240</p>
                    <h5>Listed on</h5>
                    <p>June 23, 2022</p>
                    <h5>Client</h5>
                    <p>Johnny Aiden</p>
                    <h5>Sold on</h5>
                    <p>June 30, 2022</p>

                </div>
                <hr>
                <div class="my-2">
                    <h5 class="text-uppercase mb-3">Description</h5>
                    <p>
                        Ford Territory <br>
                        Excellent condition - re-sprayed entire exterior in 2020 <br>
                        Well maintained <br>
                        Serviced regularly <br>
                        Upgraded entertainment system in 2020, can link with your phone <br>
                        New rear speakers upgraded in 2022
                    </p>
                </div>
            </div>
        </div>

        <div class="row my-4">
            <div class="col text-center">
                <button type="button" class="btn px-5 btn-primary" onclick="window.location='./my_vehicles.php';">Back</button>
            </div>
            <div class="col text-center">
                <!-- <button type="button" class="btn px-5 text-white" style="background-color: #6E6A88;">Edit</button> -->
            </div>
            <div class="col text-center">
                <button type="button" class="btn px-5 text-white" style="background-color: red;">Delete</button>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>