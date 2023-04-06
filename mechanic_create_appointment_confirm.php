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
                <a class="navbar-brand" href="./mechanic_appointments_upcoming.php">
                    <img src="./img/WW Logo.png" width="35" class="logo" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="./mechanic_appointments_upcoming.php">My Appointments</a>
                        <a class="nav-link nav-active-border" href="./mechanic_create_appointment.php">Create
                            Appointments</a>
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
                                <a class="dropdown-item" href="./mechanic_appointments_upcoming.php?logout='1'">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <div class="row mb-4" style="width: 200px;">
            <h5 class="text-start"><i class="fa-solid fa-location-dot"></i> Current Location</h5>
            <input class="form-control" type="text" placeholder="Bangkok, 10240" aria-label="default input example">
        </div>
        <div class="row">
            <h3>Confirm Appointments</h3>
        </div>

        <div class="card my-3" style="width: 750px;">
            <div class="card-body">
                <div class="row">
                    <div class="">
                        <h5>Appointment #1</h5>
                        <div class="row my-3">
                            <div class="col text-center">
                                <h6>Appointment Date</h6>
                                <p>September 15, 2022</p>
                            </div>
                            <div class="col text-center">
                                <h6>Appointment Time</h6>
                                <p>09:00 AM</p>
                            </div>
                            <div class="col text-center">
                                <h6>Consulting Price</h6>
                                <p>1,000 THB</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="card my-3" style="width: 750px;">
            <div class="card-body">
                <div class="row">
                    <div class="">
                        <h5>Appointment #2</h5>
                        <div class="row my-3">
                            <div class="col text-center">
                                <h6>Appointment Date</h6>
                                <p>September 15, 2022</p>
                            </div>
                            <div class="col text-center">
                                <h6>Appointment Time</h6>
                                <p>05:00 PM</p>
                            </div>
                            <div class="col text-center">
                                <h6>Consulting Price</h6>
                                <p>1,000 THB</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="row my-5" style="width: 750px;">
            <div class="col">
                <button type="button" class="btn btn-primary" onclick="window.location='./mechanic_create_appointment.php';">Back</button>
            </div>
            <div class="col text-end">
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>