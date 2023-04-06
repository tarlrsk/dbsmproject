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
                        <a class="nav-link nav-active-border" href="./mechanic_appointments_upcoming.php">My Appointments</a>
                        <a class="nav-link" href="./mechanic_create_appointment.php">Create Appointments</a>
                        <a class="nav-link" href="./mechanic_manage_appointment.php">Manage
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
                                <a class="dropdown-item" href="./seller_account.php">Account</a>
                                <a class="dropdown-item" href="./mechanic_account?logout='1'">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4" style="width: 500px;">
        <div class="row">
            <h3>My Account</h3>
        </div>

        <!-- Car Detail Cards -->
        <div class="mx-auto">
            <div class="my-2">
                <label for="inputName4" class="form-label">Your Name</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Johnny Aiden" disabled>
            </div>
            <div class="my-2">
                <label for="inputDate4" class="form-label">Date of Birth</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="09/28/2000" disabled>
            </div>
            <div class="my-2">
                <label for="inputEmail4" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="johnnyaiden@gmail.com" disabled>
            </div>
            <div class="my-2">
                <label for="inputPhone4" class="form-label">Phone Number</label>
                <input type="phonenumber" class="form-control" id="inputEmail4" placeholder="06237827332" disabled>
            </div>
            <!-- <div class="my-2">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputEmail4">
            </div> -->
            <div class="my-2">
                <label for="inputPassword4" class="form-label">Location</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Bangkok, 10240" disabled>
            </div>
            <div class="row text-center my-4">
                <div class="col">
                    <button type="button" class="btn btn-primary px-5" onclick="window.location='./mechanic_appointments_upcoming.php';">Cancel</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary px-5" onclick="window.location='./mechanic_account_edit.php';">Edit</button>
                </div>


            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>