<?php
session_start();
 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: adminlogin.php");
    exit;
}
//$conn=mysqli_connect("localhost","root","","sturms") or die("connection not established");
include "adcon.php";

if(isset($_POST['ids']))
{
        
        $result = mysqli_query($conn,"SELECT * from adminstudent where rollno='".$_POST['ids']."'");
        $row = mysqli_fetch_assoc($result);
        }
    else{
       die(mysqli_error($conn));
        //die("connection not established");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
   <link rel="stylesheet" href="assets/css/maincss.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
</head>

<body style="background-image: url('assets/img/bgn.jpg');background-size: cover;">
    
<div>
     <div class="iconbar-right" style="margin-top: -38px;float: right;margin-right: 20px"> <button class="btn btn-primary btn-block" style="background-color: #6665b1;" href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></button></div>
    <div class="login-clean">
        <form class="shadow" method="post" style="max-width: 480px;">
            
            <h3 class="text-uppercase text-center justify-content-center" style="color: black">Update Student</h3><br>
            <input type="hidden" name="ids" value="<?php echo $row['ids']; ?>" />       
            <div class="form-group"><input class="form-control" name="rollno" placeholder="Roll No" value="<?php echo $row['rollno'];?>"></div>
            <div class="form-group"><input class="form-control" name="name" placeholder="Name" value="<?php echo $row['name'];?>"></div>
            <div class="form-group">
            <select class="form-control" name="department" style="color: rgb(0,0,0);"> 
            <option> Department</option>
            <option <?php if($row['department']=="COMPUTER"){echo "selected";}?>>COMPUTER</option>
            <option <?php if($row['department']=="INFORMATION TECHNOLOGY"){echo "selected";}?>>INFORMATION TECHNOLOGY</option>
            <option <?php if($row['department']=="ELECTRONICS & TELECOMMUNICATION"){echo "selected";}?>>ELECTRONICS & TELECOMMUNICATION</option>
            <option <?php if($row['department']=="ELECTRONICS"){echo "selected";}?>>ELECTRONICS</option>
            <option <?php if($row['department']=="INSTRUMENTATION"){echo "selected";}?>>INSTRUMENTATION</option>
            </select></div>
            <div class="form-group">
            <select class="form-control" name="year" style="color: rgb(0,0,0);"> 
            <option> Year</option>
            <option <?php if($row['year']=="First Year"){echo "selected";}?>>First Year</option>
            <option <?php if($row['year']=="Second Year"){echo "selected";}?>>Second Year</option>
            <option <?php if($row['year']=="Third Year"){echo "selected";}?>>Third Year</option>
            <option <?php if($row['year']=="BE"){echo "selected";}?>>BE</option>
            </select></div>
        <div class="form-group"><input class="form-control" type="tel" name="mobileno" placeholder="Mobile No" value="<?php echo $row['mobileno'];?>"></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $row['email'];?>"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: #6665b1;" name="save">Save</button></div>
        </form>

        <?php

                if(isset( $_POST["save"])){
                     $rollno=$_POST["rollno"];
                     $name=$_POST["name"];
                     $department=$_POST["department"];
                     $year=$_POST["year"];
                     $mobileno=$_POST["mobileno"];
                     $email=$_POST["email"];
                
                    $query="update adminstudent set ids='".$_POST['ids']."',rollno='$rollno',name='$name',department='$department',year='$year',mobileno='$mobileno',email='$email' where ids='".$_POST['ids']."'";
                    echo $query."<br>";
                    $run=mysqli_query($conn,$query);
                    if(isset($run)){
                        echo "<script>alert('Successful!');</script>";
                        echo "<script>window.location.href='./adminstudent.php';</script>";  
                     }
                }
            ?>       
        
        </div>
</div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>
</html>