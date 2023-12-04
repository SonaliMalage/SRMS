<?php

session_start();
include "adcon.php";
function email_exists($email,$conn)
{
$row=mysqli_query($conn,"SELECT * FROM adminstudent WHERE email='$email';");

  {
    if(mysqli_num_rows($row)==0)
      {
         return false;
       }
       else
       {
       return  true;
       }
        }  
}

if(isset($_POST['Submit']))
{
    $email=$_POST['email'];

     $_SESSION['email']= $email;
   
    if(email_exists($email,$conn))
      {  
  echo "<script>window.location.href='./studentresetpass.php';</script>";
        
    }
      else{echo "<script>alert('Invalid Email!');</script>";
       
         }}
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
    <div style="float:left; margin-top: 10px;margin-left: 20px;"><a class="btn btn-primary" style="background-color: #6665b1;border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); " href="homepage.php"><i class="fa fa-home" style=" color: white;"></i> &nbsp;<b>Home</b></a></div><br><br>
    <div class="login-clean">
        <form method="post" style="max-width: 480px;"><h3 class="text-uppercase text-center justify-content-center" style="color: black">Forgot Password</h3><br>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
            <div class="form-group"><button class="btn btn-primary btn-block" role="button" style="background-color: #6665b1;" name="Submit">Submit</button></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>