<?php

$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
   include 'Partials/dbconnect.php';
    
    $username = $_POST["username"];
    $password = $_POST["Password"];
    $cpassword = $_POST["cPassword"];

  //Check whether this username Exists
    $existSql = "SELECT * FROM 'users' WHERE username = '$username'";
    $result = mysqli_query($conn,$existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
      // $exists = true;
     $showError = " username already exist";
    }
    else{
      //  $exists = false;
    if(($password == $cpassword)){
      $hash = password_hash($password, PASSWORD_DEFAULT);
       $sql = "INSERT INTO `users` ( `username`, `password`, `date`) VALUES ( '$username', '$hash', current_timestamp())";
       $result = mysqli_query($conn,$sql);
       if($result){
           $showAlert = true;
       }
    }
    else{
        $showError = "Please enter the same password as above";
    }
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Signup</title>
  </head>
  <body>
    <?php require 'Partials/_nav.php' ?>
    <!--alert tag--->
    <?php
    if($showAlert){
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
   <strong>success!</strong>Your account has been created succesfully  and you can login
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>';
    }
    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong>'.$showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
         }
?>
    <div class="container">
      <h1 class="text-center">Signup to our website</h1>
      <form action="/LOGIN SYSTEM PHP PROJECT/Signup.php" method="post">
         <div class="form-group col-md-6">
        <label for="username">username</label>
        <input type="text" class="form-control" id="username"  name="username" aria-describedby="emailHelp">
       
    </div>
  <div class="form-group col-md-6">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="Password" name="Password">
  </div>
  <div class="form-group col-md-6">
    <label for="cPassword">Confirm-Password</label>
    <input type="password" class="form-control" id="cPassword" name="cPassword">
    <small id="emailHelp" class="form-text text-muted">Make Sure to type the same password.</small>
  </div>
  
  <button type="submit" class="btn btn-primary col-md-6">Signup</button>
</form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>