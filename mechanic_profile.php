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
                                <a class="dropdown-item" href="./mechanic_appointments_upcoming.php?logout='1'">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col">
                <img src="./img/christian.jpg" class="rounded-circle" style="width:150px;" alt="">
            </div>
            <div class="col-10 mt-2">
                <h4>Micheal Wong</h4>
                <p><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;Bangkok, 10240</p>
                <div class="">
                    <i class="fa fa-star rating-color"></i>
                    <i class="fa fa-star rating-color"></i>
                    <i class="fa fa-star rating-color"></i>
                    <i class="fa fa-star rating-color"></i>
                    <i class="fa fa-star"></i>
                    &nbsp;&nbsp;12 reviews
                </div>
                <p class="my-2">Serivce Fee: <span>฿&nbsp;&nbsp;100</span></p>
            </div>
        </div>
        <div class="row my-4">
            <h5 class="mb-3">Customers' Reviews</h5>
            <div class="row my-3">
                <div class="col">
                    <h5>Sort By</h5>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Most Recent</option>
                        <option value="1">5 stars</option>
                        <option value="2">4 stars</option>
                        <option value="3">3 stars</option>
                        <option value="4">2 stars</option>
                        <option value="5">1 stars</option>
                    </select>
                </div>
                <div class="col">

                </div>
            </div>
            <!-- Customers' Reviews Card -->
            <div class="row mx-auto my-2">
                <div class="card" style="width: 40rem;">
                    <div class="card-body">
                        <div class="row mx-auto">
                            <div class="col-2 text-center px-0">
                                <img src="./img/christian.jpg" class="rounded-circle" style="width:75px;" alt="">
                            </div>
                            <div class="col-10 my-auto px-2">
                                <h6>Micheal Wong</h6>
                                <div class="">
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="text-muted">Reviewed on Sep 18th, 2022</p>
                            </div>
                        </div>
                        <p class="card-text my-2">This is a wider card with supporting text below as a natural lead-in
                            to
                            additional content. This content is a little bit longer.</p>
                        <div class="row">
                            <div class="col">
                                <img src="./img/car_one.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col">
                                <h6 class="mb-1 fw-bold">Toyota GR Supa</h6>
                                <p class="">Toyota</p>
                                <div class="row">
                                    <h6 class="mb-1">Year</h6>
                                    <p>2018</p>
                                </div>
                                <div class="row">
                                    <h6 class="mb-1">Engine</h6>
                                    <p>1,200 cc</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mx-auto my-2">
                <div class="card" style="width: 40rem;">
                    <div class="card-body">
                        <div class="row mx-auto">
                            <div class="col-2 text-center px-0">
                                <img src="./img/christian.jpg" class="rounded-circle" style="width:75px;" alt="">
                            </div>
                            <div class="col-10 my-auto px-2">
                                <h6>Micheal Wong</h6>
                                <div class="">
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star rating-color"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p class="text-muted">Reviewed on Sep 18th, 2022</p>
                            </div>
                        </div>
                        <p class="card-text my-2">This is a wider card with supporting text below as a natural lead-in
                            to
                            additional content. This content is a little bit longer.</p>
                        <div class="row">
                            <div class="col">
                                <img src="./img/car_one.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col">
                                <h6 class="mb-1 fw-bold">Toyota GR Supa</h6>
                                <p class="">Toyota</p>
                                <div class="row">
                                    <h6 class="mb-1">Year</h6>
                                    <p>2018</p>
                                </div>
                                <div class="row">
                                    <h6 class="mb-1">Engine</h6>
                                    <p>1,200 cc</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <a href="./vehicle-details.php" class="my-2 btn btn-primary">Back</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>