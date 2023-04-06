<?php
session_start();
include('server.php');
include('verify_seller.php');

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
            <div class="col-3 mt-3">
                <label for="appointment_date" class="form-label" aria-required="true">Search by Date</label>
                <input type="date" class="form-control mb-2" id="appointment_date" name="appointment_date">
            </div>
            <div class="col mt-5">
                <button type="button" class="btn p btn-primary">Search <span><i class="fa-solid fa-magnifying-glass"></i></span></button>
            </div>
        </div>

        <div>

            <?php
            $select_stmt = $db->prepare("SELECT * FROM car_tb WHERE seller_id = '$seller_id' AND car_status = 'available'");
            $select_stmt->execute();

            //loop that show dataa of every row form database
            while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) { 

            ?>
                <div class="row my-4" style="width: 900px;">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <img class="card-img-top" src="./img_vehicle/<?php echo $row['car_img']; ?>" alt="Card image cap">
                                    </div>
                                    <div class="col">
                                        <h4><?php echo $row['car_model']; ?></h4>
                                        <h5 class="text-muted"><?php echo $row['car_brand']; ?></h5>
                                        <h5><span>฿</span> <?php echo number_format($row['car_price']); ?></h5>
                                    </div>

                                </div>
                                <div class="row my-3 text-center">
                                    <div class="col">
                                        <h5 class="card-text">Year</h5>
                                        <p class="fs-5"><?php echo $row['car_year']; ?></p>
                                    </div>
                                    <div class="col">
                                        <h5 class="card-text">Gear</h5>
                                        <p class="fs-5"><?php echo $row['car_gear']; ?></p>
                                    </div>
                                    <div class="col">
                                        <h5 class="card-text">Engine</h5>
                                        <p class="fs-5"><?php echo number_format($row['car_engine']);; ?> cc</p>
                                    </div>
                                    <div class="col">
                                        <h5 class="card-text">Mileage</h5>
                                        <p class="fs-5"><?php echo number_format($row['car_mileage']); ?> km</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="fs-5">Listed on:
                                            <?php
                                            $car_list_date = $row['car_list_date'];
                                            $date = date_create("$car_list_date");
                                            echo date_format($date, "F d, Y");
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-3 bg-success text-center py-2 rounded">
                                        <a href="./my_vehicle_page.php?car_id=<?php echo $row['car_id'] ?>" class="text-white stretched-link fs-5 my-auto" style="text-decoration: none;">Available</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            <?php } ?>





        </div>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>