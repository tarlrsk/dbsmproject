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
                        <a class="nav-link nav-active-border" href="./buyer_appointments_upcoming.php">My Appointments</a>
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
                                <a class="dropdown-item" href="./buyer_appointments_upcoming.php?logout='1'">Logout</a>
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
                    <a class="nav-link active px-5" aria-current="page" href="./buyer_appointments_upcoming.php">Upcoming</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-5" href="./buyer_appointments_pending.php">Pending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-5" href="./buyer_appointments_completed.php">Completed</a>
                </li>
            </ul>
        </div>
        <!-- Car Detail Cards -->
        <div class="row my-3">
            <?php
            $select_stmt = $db->prepare("SELECT * FROM appoint_tb
                                    INNER JOIN car_tb
                                    ON appoint_tb.car_id = car_tb.car_id
                                    INNER JOIN seller_tb
                                    ON appoint_tb.seller_id = seller_tb.seller_id
                                    INNER JOIN buyer_tb
                                    ON appoint_tb.buyer_id = buyer_tb.buyer_id
                                    WHERE appoint_tb.buyer_id = '$buyer_id'
                                    AND buyer_status = '1'");
            $select_stmt->execute();

            //loop that show dataa of every row form database
            while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {

            ?>
                <div class="row my-3">
                    <div class="card" style="width: 60rem;">
                        <div class="card-body">
                            <div class="row my-3 text-center">
                                <div class="col">
                                    <h5 class="card-text">Date</h5>
                                    <p class="fs-5">
                                        <?php
                                        $appoint_date = $row['appoint_date'];
                                        $date = date_create("$appoint_date");
                                        echo date_format($date, "F d, Y");
                                        ?></p>
                                </div>
                                <div class="col">
                                    <h5 class="card-text">Seller</h5>
                                    <p class="fs-5"><?php echo $row['seller_name']; ?></>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-4">
                                    <img class="card-img-top" src="./img_vehicle/<?php echo $row['car_img']; ?>" alt="Card image cap">
                                </div>
                                <div class="col">
                                    <h4><?php echo $row['car_model']; ?></h4>
                                    <h5 class="text-muted"><?php echo $row['car_brand']; ?></h5>
                                    <div class="row my-3 text-center">
                                        <div class="col">
                                            <h5 class="card-text">Year</h5>
                                            <p class="fs-5"><?php echo $row['car_year']; ?></p>
                                        </div>
                                        <div class="col">
                                            <h5 class="card-text">Transmission</h5>
                                            <p class="fs-5"><?php echo $row['car_gear']; ?></p>
                                        </div>
                                        <div class="col">
                                            <h5 class="card-text">Price</h5>
                                            <p class="fs-5"><?php echo number_format($row['car_price']); ?> THB
                                                <p />
                                        </div>
                                    </div>
                                    <div class="row text-end">
                                        <div class="col">

                                        </div>
                                        <div class="col-2">
                                            <button type="button" class="btn p btn-primary" onclick="window.location='./buyer_appointment_details_upcoming.php?appoint_id=<?php echo $row['appoint_id'] ?>';">View <span><i class="fa-solid fa-arrow-right"></i></span></button>
                                        </div>
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