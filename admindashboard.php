<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

    header("location: adminlogin.php");
    exit;
}
//$conn=mysqli_connect("localhost","root","","sturms") or die("connection not established");

include "adcon.php";
 $result1 = mysqli_query($conn,"select name from admindetails where email='".$_SESSION['email']."'");
        $row = mysqli_fetch_assoc($result1);

?>
<!DOCTYPE html>
<html style="color: rgb(255,255,255);">

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
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
   <link rel="stylesheet" href="assets/css/maincss.css">
</head>

<body  style="background-image: url('assets/img/bgn.jpg');background-size: cover;">
    
    <div>
        <div class="row">
         <div class="col-md-12"><br><br>
        <div class="icon-bar">
   <h1 class="text-uppercase text-center justify-content-center" style="font-weight:bold;font-family:Alegreya, serif;background-color:#d96ed1;color:white;">Dashboard</h1>
     </div>
    <div style="float:right; margin-top: -51px;float: right;margin-right: 20px;"><a class="btn btn-primary" style="background-color: #6665b1; border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);" href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></a></div> </div>
   
        <div class="container">
            
            <br><br><br>
            <div class="row">

                <div class="col-md-4">
                     <div class="login-clean">
                        <form class="shadow"><center>
                            <i class="far fa-list-alt" style="font-size: 100px;"></i><br><br>
                            <a class="btn btn-primary btn-lg" role="button" data-bs-hover-animate="pulse" href="adminsemester.php">Semesters/Subjects</a></center></form></div></div>

                <div class="col-md-4"><div class="login-clean">
                        <form class="shadow"><center><i class="fas fa-chalkboard-teacher" style="font-size: 100px;"></i><br><br> <a class="btn btn-primary btn-lg" role="button" data-bs-hover-animate="pulse" href="adminteacher.php">Teachers</a></center></form></div></div>

                <div class="col-md-4"><div class="login-clean">
                        <form class="shadow"><center>
                    <i class="fas fa-user-friends" style="font-size: 100px;"></i><br><br><a class="btn btn-primary btn-lg" role="button" data-bs-hover-animate="pulse" href="adminstudent.php">Students</a></center></form></div></div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>
</html>