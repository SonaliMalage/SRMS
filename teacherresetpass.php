<?php
session_start();
include "adcon.php";
$errors = [];

// ENTER A NEW PASSWORD
if (isset($_POST['repass'])) {
  //$Username = mysqli_real_escape_string($db, $_POST['Username']);
 
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $repassword = mysqli_real_escape_string($conn, $_POST['repassword']);
  
  $email = $_SESSION['email'];

  if ($password !== $repassword) array_push($errors, "Password do not match");

  if (count($errors) == 0) {
     $password=md5($password);
     
     $query="UPDATE adminteacher SET password='$password' WHERE email='$email'";
                    $run=mysqli_query($conn,$query);
                    if(isset($run))
                    {
                        echo "<script>alert('Successful');</script>";
                  echo "<script>window.location.href='./teacherindex.php';</script>";
    }
  }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>StuResMgt</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search-1.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
   <link rel="stylesheet" href="assets/css/maincss.css">
</head>

<body style="background-image: url('assets/img/bgn.jpg');background-size: cover;">
    <div style="float:left; margin-top: 10px;margin-left: 20px;"><a class="btn btn-primary" style="background-color: #6665b1; border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); " href="homepage.php"><i class="fa fa-home" style=" color: white;"></i> &nbsp;<b>Home</b></a></div><br><br>
    <div class="login-clean">
        <form method="post" style="max-width: 480px;">
             <?php  if (count($errors) > 0) : ?>
  <div class="msg">
    <?php foreach ($errors as $error) : ?>
      <span><?php echo $error ?></span>
    <?php endforeach ?>
  </div>
<?php  endif ?>

            <h3 class="text-uppercase text-center justify-content-center" style="color: black">Reset Password</h3><br>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"  id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></div>
           
<script>
      function myFunct() {
      var x = document.getElementById("password");
      var y = document.getElementById("repassword");
      if (x.type === "password" && y.type === "password") {
      x.type = "text";
      y.type = "text";
      } else {
      x.type = "password";
      y.type = "password";
      }
      }
      </script>

            <div class="form-group"><input class="form-control" type="password" name="repassword" id="repassword" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></div>
             <input type="checkbox" id="rpa" onclick="myFunct()">&nbsp;<label for="rpa">Show Password</label>

            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: #6665b1;" name="repass">Reset Password</button></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>