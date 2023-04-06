<?php
session_start();
include('server.php');
include('verify_buyer.php');

if (isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];
} else {
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
                        <a class="nav-link nav-active-border" aria-current="page" href="cars.php">Cars</a>
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


    <?php
    $select_stmt = $db->prepare("SELECT * FROM car_tb 
                                    INNER JOIN seller_tb 
                                    ON car_tb.seller_id = seller_tb.seller_id
                                    INNER JOIN seller_slot_tb
                                    ON seller_slot_tb.car_id = '$car_id'
                                    WHERE car_tb.car_id = '$car_id'");
    $select_stmt->execute();

    while ($info = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="container mt-4">
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
                        <p class="mb-2 fs-6 text-end"><i class="fa-regular fa-heart fs-4"></i></p>
                    </div>
                    <div class="mb-4">
                        <h2 class=""><?php echo $info['car_brand'] ?> <?php echo $info['car_model'] ?></h2>
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
                    <div class="row" style="cursor: pointer;" onclick="window.location='./seller_profile.php';">
                        <div class="col-2">
                            <img src="./img/christian.jpg" style="width:75px;" class="rounded-circle" alt="">
                        </div>
                        <div class="col">
                            <h5 class="mt-2"><?php echo $info['seller_name'] ?></h5>
                            <p><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;<?php echo $info['car_location'] ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="text-uppercase mb-3">Description</h5>
                        <p>
                            <?php echo $info['car_des'] ?>
                        </p>
                    </div>
                    <hr>
                    <div class="d-grid gap-2">

                        <form action="./confirmation.php?car_id=<?php echo $car_id ?>" method="post">
                            <div class="mb-2">
                                <p class="fs-5 fw-bold">Make an appointment with the seller</p>
                                <label class="form-label" for="autoSizingSelect">Appointment Date</label>
                                <select class="form-select" id="autoSizingSelect" name="appoint_date" required>
                                    <option selected>Choose...</option>
                                    <option value="<?php echo $info['seller_slot_date'] ?>">
                                        <?php
                                        $seller_slot_date = $info['seller_slot_date'];
                                        $date = date_create("$seller_slot_date");
                                        echo date_format($date, "F d, Y");
                                        ?>
                                    </option>
                                </select>
                                <div class="my-4">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="hireMechanic" name="hireMechanic" value="1">
                                        <label class="form-check-label" for="autoSizingCheck2">
                                            Do you wanna hire a mechanic to check the vehicle?
                                        </label>
                                    </div>
                                    <div id="mechanicsdiv" style="display: none;">
                                        <h6>Choose an mechanics</h6>
                                        <ul class="list-group">

                                            <?php
                                            $select_stmt = $db->prepare("SELECT * FROM mechanic_tb
                                                                        INNER JOIN mechanic_slot_tb
                                                                        ON mechanic_tb.mechanic_id = mechanic_slot_tb.mechanic_id 
                                                                        WHERE mechanic_slot_date = '$seller_slot_date'
                                                                        AND mechanic_slot_status = '1'");
                                            $select_stmt->execute();

                                            while ($info = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                                            ?>

                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-1 my-auto">
                                                            <input class="form-check-input" type="radio" name="mechanic_slot" value="<?php echo $info['mechanic_slot_id']?>" id="firstRadio" checked>
                                                        </div>
                                                        <div class="col-2 my-auto">
                                                            <img src="./img/christian.jpg" class="rounded-circle" style="width:75px;" alt="">
                                                        </div>
                                                        <div class="col my-auto" style="cursor: pointer;" onclick="window.location='./mechanic_profile.php';">
                                                            <p class="fw-bold fs-6 mb-0"><?php echo $info['mechanic_name'] ?></p>
                                                            <div class="">
                                                                <i class="fa fa-star rating-color"></i>
                                                                <i class="fa fa-star rating-color"></i>
                                                                <i class="fa fa-star rating-color"></i>
                                                                <i class="fa fa-star rating-color"></i>
                                                                <i class="fa fa-star"></i>
                                                                &nbsp;&nbsp;12 reviews
                                                            </div>
                                                            <p class="mb-1">Serivce Fee: <span>฿&nbsp;&nbsp;<?php echo number_format($info['mechanic_price']) ?></span></p>
                                                        </div>
                                                    </div>
                                                </li>

                                            <?php } ?>


                                            
                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <button class="btn btn-primary" style="width:100%; margin-bottom:20px;" type="submit"><i class="fa-solid fa-calendar-check"></i>&nbsp;&nbsp;Book an appointment</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    <?php } ?>


    <script type="text/javascript">
        const checkbox = document.getElementById('hireMechanic');
        const box = document.getElementById('mechanicsdiv');

        checkbox.addEventListener('click', function handleClick() {
            if (checkbox.checked) {
                box.style.display = 'block';
            } else {
                box.style.display = 'none';
            }
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>