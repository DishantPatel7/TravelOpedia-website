<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists=false;
    if(($password == $cpassword) && $exists==false){
        $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }
    }
    else{
        $showError = "Passwords do not match";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>SignUp</title>
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

    <div class="hero">
       <div class="form-box">
          <!-- <h1 class="text-center">SING-UP</h1> -->
          <div class="social-icon">
               <img src="fcbok.png" alt="facebook ">
                <img src="ins.png" alt="instagram">
                <img src="twi.png" alt="twitter">
                <img src="ggle.png" alt="google">
            </div>




         <form action="/loginsystem/signup.php" method="post">
         <div class="form-group" style="padding-left: 25px;">
                 <!-- <label for="username">Username</label> -->
                 <input type="text" class="input-field" id="username" name="username" aria-describedby="emailHelp" placeholder="username" Required>
                </div>
                <div class="form-group" style="padding-left: 25px; height: 40px;width: 345px;padding-top: 0px;padding-bottom: 20px;">
                 <!-- <label for="password">Password</label> -->
                 <input type="password" class="input-field" id="password" name="password" placeholder="password" Required>
                </div>
                <div class="form-group" style="padding-left: 25px;height: 40px;width: 375px;padding-top: 15px;padding-bottom: 20px;">

                 <!-- <label for="cpassword">Confirm Password</label> -->
                 <input type="password" class="input-field" id="cpassword" name="cpassword" placeholder="Confirm password" Required>
                 <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
                </div>
                
              <button type="submit" class="submit-btn" style="margin-top: 90px;">SignUp</button>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
