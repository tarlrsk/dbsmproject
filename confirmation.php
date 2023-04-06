<?php
session_start();
include('server.php');
include('verify_buyer.php');

if (isset($_GET['car_id'])) {
    $car_id = $_GET['car_id'];
} else {
    header('location: my_vehicles.php');
}

$appoint_date = $_POST['appoint_date'];
$mechanic_advise = $_POST['hireMechanic'];
$mechanic_id = "";
$mechanic_slot = $_POST['mechanic_slot'];

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
                                <a class="dropdown-item" href="./confirmation.php?logout='1'">Logout</a>
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



        <div class="confirmation-box-bg py-4">
            <div class="card confirmation-box mx-auto mb-5">
                <div class="row justify-content-center my-3">
                    <div class="col-1">
                        <img class="" src="./img/WW Logo.png" alt="">
                    </div>
                    <div class="col-7 text-center my-auto">
                        <h4 class="mb-0 text-orange">Thank you for choosing Wise Wallet</h4>
                    </div>
                </div>
                <hr class="my-1">
                <div class="card-body">
                    <div class="row text-center mb-4">
                        <h4>Please kindly confirm the detail of your appointment</h4>
                    </div>

                    <div class="row confirm-info-box mx-auto">
                        <div class="card">
                            <div class="row text-center confirm-top">
                                <div class="my-3">
                                    <h5>
                                        <?php
                                        $date = date_create("$appoint_date");
                                        echo date_format($date, "F d, Y");
                                        ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="row my-2">
                                <img src="./img_vehicle/<?php echo $info['car_img'] ?>" alt="">
                            </div>
                            <div class="row mx-4">
                                <h2><?php echo $info['car_brand'] ?> <?php echo $info['car_model'] ?></h2>
                                <h4 class="my-2 fw-bold"><span>฿</span> <?php echo number_format($info['car_price']) ?></h4>
                                <h5>Appointment Location</h5>
                                <p><?php echo $info['car_location'] ?></p>
                            </div>
                            <div class="row mx-2 mb-4 mt-2">
                                <div class="col">
                                    <div class="row">
                                        <div class="col text-center px-0">
                                            <img src="./img/christian.jpg" style="width:75px;" class="rounded-circle" alt="">
                                        </div>
                                        <div class="col px-0">
                                            <p class="h6"><span class="badge rounded-pill bg-primary">Seller</span></p>
                                            <p><?php echo $info['seller_name'] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($mechanic_advise == '1') {
                                    $mechanic_check = "SELECT * FROM mechanic_tb
                                                        INNER JOIN mechanic_slot_tb
                                                        ON mechanic_tb.mechanic_id = mechanic_slot_tb.mechanic_id
                                                        WHERE mechanic_slot_id = $mechanic_slot
                                                        LIMIT 1";
                                    $result = mysqli_query($conn, $mechanic_check);
                                    $mechanic = mysqli_fetch_assoc($result);
                                    $mechanic_id = $mechanic['mechanic_id']
                                ?>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col text-center px-0">
                                                <img src="./img/christian.jpg" style="width:75px;" class="rounded-circle" alt="">
                                            </div>
                                            <div class="col px-0">
                                                <p class="h6"><span class="badge rounded-pill bg-primary">Mechanic</span></p>
                                                <p><?php echo $mechanic['mechanic_name']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="row mx-5 my-4">
                        <div class="col text-start">
                            <button type="button" class="btn btn-primary" onclick="window.location='./vehicle-details.php?car_id=<?php echo $info['car_id'] ?>';">Back</button>
                        </div>
                        <div class="col text-end">
                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#thankYouModal">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="thankYouModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center mx-2">
                        <h3>Thank you!</h3>
                        <p>Thank you for confirming you appointment with us. Kindly wait for our associates to contact you
                            within 3 working days.</p>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="button" class="btn btn-primary" onclick="window.location='./confirmation_db.php?car_id=<?php echo $info['car_id'] ?>&seller_id=<?php echo $info['seller_id'] ?>&mechanic_advise=<?php echo $mechanic_advise ?>&date=<?php echo $appoint_date  ?>&mechanic_id=<?php echo $mechanic_id  ?>&mechanic_slot=<?php echo $mechanic_slot ?> ';">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>