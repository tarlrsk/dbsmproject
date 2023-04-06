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
                        <a class="nav-link" aria-current="page" href="./my_vehicles.php">My Vechicles</a>
                        <a class="nav-link nav-active-border" aria-current="page" href="./post_new_vehicle.php">Post a new vehicle</a>
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
        <!-- bootstrap css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- google font -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

        <h1 class="text-center fs-4">Post a new vehicle</h1>
        <form id="signUpForm" action="./post_new_vehicle_db.php" method="post" enctype="multipart/form-data">
            <!-- start step indicators -->
            <div class="form-header d-flex mb-4">
                <span class="stepIndicator">Vehicle Information</span>
                <span class="stepIndicator">Appointment Information</span>
                <span class="stepIndicator">Preview</span>
            </div>
            <!-- end step indicators -->

            <!-- step one -->
            <div class="step">
                <p class="text-center mb-4">Fill in the vehicle information</p>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload your vehicle pictures</label>
                    <input class="form-control" type="file" id="formFile" name="formFile">
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" oninput="this.className = ''" placeholder="Toyota" name="brand" id="brand">
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" oninput="this.className = ''" placeholder="Toyota GR Supra" name="model" id="model">
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Year</label>
                    <input type="text" oninput="this.className = ''" placeholder="2017" name="year" id="year" maxlength="4">
                </div>
                <div class="mb-3">
                    <label for="mileage" class="form-label">Mileage</label>
                    <input type="number" oninput="this.className = ''" placeholder="1,500 km" name="mileage" id="mileage">
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" oninput="this.className = ''" placeholder="Bangkok, 10240" name="location" id="location">
                </div>
                <div class="mb-3">
                    <label for="seat" class="form-label">Seat Capacity</label>
                    <input type="number" oninput="this.className = ''" placeholder="4" name="seat" id="seat">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">GearBox</label>
                    <input type="text" oninput="this.className = ''" placeholder="Automatic" name="gear" id="gear">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Engine Size</label>
                    <input type="number" oninput="this.className = ''" placeholder="3,000 cc" name="engine" id="engine">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Fuel Type</label>
                    <input type="text" oninput="this.className = ''" placeholder="Disel" name="fuel" id="fuel">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" oninput="this.className = ''" placeholder="800,000 baht" name="price" id="price">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" oninput="this.className = ''" rows="5" placeholder="" name="description" id="description"></textarea>
                </div>
            </div>

            <!-- step two -->
            <div class="step">
                <p class="text-center mb-4">Add appointment slots</p>
                <div class="mb-3">
                    <h5>Appointment Datetime #1</h5>
                    <div class="row">
                        <div class="col">
                            <label for="appointment_date" class="form-label">Select Appointment Date & Time</label>
                            <input type="date" oninput="this.className = ''" placeholder="Select Appointment Date" name="appointment_date" id="appointment_date">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="button" class="btn p btn-primary">Add new appointment Datetime</button>
                </div>
            </div>

            <!-- step three -->
            <div class="step">
                <p class="text-center mb-4">Preview</p>
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
                            <p class="mb-2 fs-6 text-end"><i class="fa-regular fa-heart fs-4"></i></p>
                        </div>
                        <div class="mb-4">
                            <h2 class="" id="brandModel"></h2>
                            <h3 class="my-3 fw-bold" id="prePrice"><span>฿</span> 500,000</h3>
                        </div>
                        <div>
                            <h4 class="text-uppercase">Specification</h4>
                            <hr>
                            <div class="row">
                                <div class="col text-center">
                                    <h5>Year</h5>
                                    <p id="preYear">2018</p>
                                </div>
                                <div class="col text-center">
                                    <h5>Seat Capacity</h5>
                                    <p id="preSeat">4</p>
                                </div>
                                <div class="col text-center">
                                    <h5>Mileage</h5>
                                    <p id="preMileage">3,000 km</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col text-center">
                                    <h5>Gearbox</h5>
                                    <p id="preGear">Automatic</p>
                                </div>
                                <div class="col text-center">
                                    <h5>Engine Size</h5>
                                    <p id="preEngine">3,000 cc</p>
                                </div>
                                <div class="col text-center">
                                    <h5>Fuel Type</h5>
                                    <p id="preFuel">Disel</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-2">
                                <img src="./img/christian.jpg" style="width:75px;" class="rounded-circle" alt="">
                            </div>
                            <div class="col">
                                <h5 class="mt-2" id="seller_name"><?php echo $seller_name ?></h5>
                                <p id="preLocation"><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;Bangkok, 10240</p>
                            </div>
                        </div>
                        <hr>
                        <div class="my-2">
                            <h5 class="text-uppercase mb-3">Description</h5>
                            <p id="preDescription">
                            </p>
                        </div>
                        <div class="accordion" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Appointments
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <h5>Appointment #1</h5>
                                            <p class="mb-2" id="preDate">Date: 27th September, 2022</p>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- start previous / next buttons -->
            <div class="form-footer d-flex">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Back</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
            <!-- end previous / next buttons -->
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        console.log(currentTab)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("step");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // Store input value
            var brand = document.forms["signUpForm"]["brand"].value;
            var model = document.forms["signUpForm"]["model"].value;
            var year = document.forms["signUpForm"]["year"].value;
            var mileage = document.forms["signUpForm"]["mileage"].value;
            var location = document.forms["signUpForm"]["location"].value;
            var seat = document.forms["signUpForm"]["seat"].value;
            var gear = document.forms["signUpForm"]["gear"].value;
            var engine = document.forms["signUpForm"]["engine"].value;
            var fuel = document.forms["signUpForm"]["fuel"].value;
            var price = document.forms["signUpForm"]["price"].value;
            var description = document.forms["signUpForm"]["description"].value;
            //var appointment_date = document.forms["signUpForm"]["appointment_date"].value;
            let dtFormat = new Intl.DateTimeFormat('en-US', {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            });
            if (currentTab == 1) {
                const date = new Date(document.forms["signUpForm"]["appointment_date"].value)
                var appointment_date = new Intl.DateTimeFormat('en-US', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                }).format(date)
            }
            // → '12/19/2012'

            // Preview value
            document.getElementById("brandModel").innerHTML = brand + " " + model;
            document.getElementById("preYear").innerHTML = year;
            document.getElementById("preMileage").innerHTML = mileage.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); + " km";
            document.getElementById("preLocation").innerHTML = "&nbsp;&nbsp;" + location;
            document.getElementById("preSeat").innerHTML = seat.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");;
            document.getElementById("preGear").innerHTML = gear;
            document.getElementById("preEngine").innerHTML = engine.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","); + " cc";
            document.getElementById("preFuel").innerHTML = fuel;
            document.getElementById("prePrice").innerHTML = "<span>฿</span>" + price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");;
            document.getElementById("preDescription").innerHTML = description;
            document.getElementById("preDate").innerHTML = "Date: " + appointment_date;


            // This function will figure out which tab to display
            var x = document.getElementsByClassName("step");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("signUpForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("step");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("stepIndicator");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>
</body>

</html>