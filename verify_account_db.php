<?php 
session_start();
include('server.php');




// REGISTER BUYER
if (isset($_POST['reg_buyer'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($name)) { array_push($errors, "Name is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }
  
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM buyer_tb WHERE buyer_email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['buyer_email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
    $user_check_query = "SELECT * FROM mechanic_tb WHERE mechanic_email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['mechanic_email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
    $user_check_query = "SELECT * FROM seller_tb WHERE seller_email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['seller_email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
  
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password);//encrypt the password before saving in the database
  
        $query = "INSERT INTO buyer_tb (buyer_name, buyer_email, buyer_pass, buyer_phone ) 
                  VALUES('$name', '$email', '$password', '$phone')";
        mysqli_query($conn, $query);
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header('location: cars.php');
    }else{
        $_SESSION['error'] = "Email/PhoneNumber Already exists";
        header('location: index.php');
    }
  }
  
  // REGISTER SELLER
  if (isset($_POST['reg_seller'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = $_POST['phone'];
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($name)) { array_push($errors, "Name is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }
  
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM buyer_tb WHERE buyer_email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['buyer_email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
    $user_check_query = "SELECT * FROM mechanic_tb WHERE mechanic_email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['mechanic_email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
    $user_check_query = "SELECT * FROM seller_tb WHERE seller_email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['seller_email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
  
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password);//encrypt the password before saving in the database
  
        $query = "INSERT INTO seller_tb (seller_name, seller_email, seller_pass, seller_phone ) 
                  VALUES('$name', '$email', '$password', '$phone')";
        mysqli_query($conn, $query);
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header('location: seller_home.php');
    }else{
        $_SESSION['error'] = "Email/PhoneNumber Already exists";
        header('location: index.php');
    }
  }
  
  
  // REGISTER MECHANIC
  if (isset($_POST['reg_mechanic'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = $_POST['phone'];
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($name)) { array_push($errors, "Name is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }
  
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM buyer_tb WHERE buyer_email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['buyer_email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
    $user_check_query = "SELECT * FROM mechanic_tb WHERE mechanic_email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['mechanic_email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
    $user_check_query = "SELECT * FROM seller_tb WHERE seller_email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['seller_email'] === $email) {
        array_push($errors, "email already exists");
      }
    }
  
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password);//encrypt the password before saving in the database
  
        $query = "INSERT INTO mechanic_tb (mechanic_name, mechanic_email, mechanic_pass, mechanic_phone ) 
                  VALUES('$name', '$email', '$password', '$phone')";
        mysqli_query($conn, $query);
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header('location: mechanic_appointments_upcoming.php');
    }else{
        $_SESSION['error'] = "Email/PhoneNumber Already exists";
        header('location: index.php');
    }
  }
  
  
  // LOGIN USER
  if (isset($_POST['login_user'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
  
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query_buyer = "SELECT * FROM buyer_tb WHERE buyer_email='$email' AND buyer_pass='$password'";
        $query_seller = "SELECT * FROM seller_tb WHERE seller_email='$email' AND seller_pass='$password'";
        $query_mechanic = "SELECT * FROM mechanic_tb WHERE mechanic_email='$email' AND mechanic_pass='$password'";
        $results1 = mysqli_query($conn, $query_buyer);
        $results2 = mysqli_query($conn, $query_seller);
        $results3 = mysqli_query($conn, $query_mechanic);
        if (mysqli_num_rows($results1) == 1) {
          $_SESSION['email'] = $email;
          header('location: cars.php');
        }elseif(mysqli_num_rows($results2) == 1){
        $_SESSION['email'] = $email;
          header('location: seller_home.php');
        }elseif(mysqli_num_rows($results3) == 1){
        $_SESSION['email'] = $email;
          header('location: mechanic_appointments_upcoming.php');
        }else{
            array_push($errors, "Wrong email/password combination");
            $_SESSION['error'] = "Wrong Email or Password!";
            header('location: index.php');
        }
    }else{
        $_SESSION['error'] = "Email and Password is required!";
        header('location: index.php');
    }
  }

?>
