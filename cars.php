<?php
session_start();
include('server.php');
include('verify_buyer.php')
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
                <a class="navbar-brand" href="./cars.php">
                    <img src="./img/WW Logo.png" width="35" class="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link nav-active-border" aria-current="page" href="cars.php">Cars</a>
                        <a class="nav-link" href="#">Motorcycles</a>
                        <a class="nav-link" href="./buyer_appointments_upcoming.php">My Appointmenets</a>
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
                                <a class="dropdown-item border-bottom" href="./my_wishlist.php">My Wishlist</a>
                                <a class="dropdown-item" href="cars.php?logout='1'">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="mb-3">
                    <div>
                        <h5 class="text-start"><i class="fa-solid fa-location-dot"></i> Current Location</h5>
                        <input class="form-control" type="text" placeholder="Bangkok, 10240" aria-label="default input example">
                    </div>
                </div>
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item h5 text-center">Filter By</li>
                        <li class="list-group-item">
                            <h6>Brand</h6>
                            <select class="form-select" id="autoSizingSelect">
                                <option selected>Choose brand</option>
                                <option value="1">Toyota</option>
                                <option value="2">Mercedes</option>
                                <option value="3">Honda</option>
                                <option value="4">BMW</option>
                                <option value="3">Ford</option>
                                <option value="4">Mazda</option>
                            </select>
                        </li>
                        <li class="list-group-item">
                            <h6>Model</h6>
                            <select class="form-select" id="autoSizingSelect" disabled>
                                <option selected>Choose model</option>
                                <option value="1">H247</option>
                                <option value="2">W223</option>
                                <option value="3">W206</option>
                                <option value="4">H243</option>
                                <option value="3">R50 One</option>
                                <option value="4">X243</option>
                            </select>
                        </li>
                        <li class="list-group-item">
                            <h6>Mileage</h6>
                            <!-- <span><i class="fa-solid fa-chevron-down"></i></span> -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    0 - 5,000 km
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    5,000 - 10,000 km
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    10,000 - 20,000 km
                                </label>
                            </div>

                        </li>
                        <li class="list-group-item">
                            <h6>Year</h6>
                            <select class="form-select" id="autoSizingSelect">
                                <option selected>Choose year</option>
                                <option value="1">2022</option>
                                <option value="2">2021</option>
                                <option value="3">2020</option>
                                <option value="4">2019</option>
                                <option value="3">2018</option>
                                <option value="4">2017</option>
                            </select>
                        </li>
                        <li class="list-group-item">
                            <h6>Price</h6>
                            <!-- <span><i class="fa-solid fa-chevron-down"></i></span> -->
                            <div class="row">
                                <div class="col">
                                    <select class="form-select" id="autoSizingSelect">
                                        <option selected>min</option>
                                        <option value="1">25,000 Baht</option>
                                        <option value="2">30,000 Baht</option>
                                        <option value="3">40,000 Baht</option>
                                        <option value="4">50,000 Baht</option>
                                        <option value="2">60,000 Baht</option>
                                        <option value="3">70,000 Baht</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-select" id="autoSizingSelect">
                                        <option selected>max</option>
                                        <option value="1">50,000 Baht</option>
                                        <option value="2">60,000 Baht</option>
                                        <option value="3">70,000 Baht</option>
                                        <option value="4">80,000 Baht</option>
                                        <option value="3">90,000 Baht</option>
                                        <option value="4">100,000 Baht</option>
                                    </select>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="d-grid gap-2 mt-3">
                    <button type="button" class="btn btn-primary">Search</button>
                </div>
            </div>
            <div class="col-9">
                <div class="row">
                    <h2>All Cars</h2>
                </div>
                <div>
                    <?php
                    $select_stmt = $db->prepare("SELECT * FROM car_tb
                                                WHERE car_status = 'available'");
                    $select_stmt->execute();


                    //loop that show dataa of every row form database
                    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {

                    ?>

                        <div class="row my-3" style="width: 600px; margin-left:200px">
                            <div class="col">
                                <div class="card" style="cursor: pointer;" onclick="window.location='./vehicle-details.php?car_id=<?php echo $row['car_id'] ?>';">
                                    <img src="./img_vehicle/<?php echo $row['car_img']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['car_model']; ?></h5>
                                        <h6 class="text-secondary"><?php echo $row['car_brand']; ?></h6>
                                        <div class="row">
                                            <div class="col text-center">
                                                <h6 class="mb-2">Year</h6>
                                                <p><?php echo $row['car_year']; ?></p>
                                            </div>
                                            <div class="col text-center">
                                                <h6 class="mb-2">Engine</h6>
                                                <p><?php echo number_format($row['car_engine']); ?> cc</p>
                                            </div>
                                            <div class="col text-center">
                                                <h6 class="mb-2">Mileage</h6>
                                                <p><?php echo number_format($row['car_mileage']); ?> km</p>
                                            </div>
                                            <div class="col text-center">
                                                <h6 class="mb-2">Gear</h6>
                                                <p><?php echo $row['car_gear']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row mx-3">
                                            <div class="col text-start">
                                                <i class="fa-solid fa-eye"></i>
                                                <span>500</span>
                                            </div>
                                            <div class="col text-end">
                                                <h4><span>฿</span> <?php echo number_format($row['car_price']); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>