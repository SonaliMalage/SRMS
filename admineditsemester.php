<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: adminlogin.php");
    exit;
}
//$conn=mysqli_connect("localhost","root","","sturms") or die("connection not established");
include "adcon.php";

if(isset($_POST['id']))
{
        
        $result = mysqli_query($conn,"SELECT * from adminsemester where semester='".$_POST['id']."'");
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

<body  style="background-image: url('assets/img/bgn.jpg');background-size: cover;">
    
<div>
     <div class="iconbar-right" style="margin-top: -38px;float: right;margin-right: 20px"> <button class="btn btn-primary btn-block" style="background-color: #6665b1;" href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></button></div>
    <div class="login-clean">
        <form class="shadow" method="post" style="max-width: 480px;">
            
            <h3 class="text-uppercase text-center justify-content-center " style="color: black">Update Subjects</h3><br>
             <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
            <div class="form-group">
            <select class="form-control" name="semester" style="color: rgb(0,0,0);" >
                <optgroup label="Semesters">
                <option <?php if($row['semester']=="SEM I"){echo "selected";}?>>SEM I</option>
                <option <?php if($row['semester']=="SEM II"){echo "selected";}?>>SEM II</option>
                <option <?php if($row['semester']=="SEM III"){echo "selected";}?>>SEM III</option>
                <option <?php if($row['semester']=="SEM IV"){echo "selected";}?>>SEM IV</option>
                <option <?php if($row['semester']=="SEM V"){echo "selected";}?>>SEM V</option>
                <option <?php if($row['semester']=="SEM VI"){echo "selected";}?>>SEM VI</option>
                <option <?php if($row['semester']=="SEM VII"){echo "selected";}?>>SEM VII</option>
                <option <?php if($row['semester']=="SEM VIII"){echo "selected";}?>>SEM VIII</option>
            </optgroup></select>
            </div>
            <div class="form-group"><input class="form-control" name="sub1" placeholder="Subject 1" value="<?php echo $row['sub1'];?>"></div>
            <div class="form-group"><input class="form-control" name="sub2" placeholder="Subject 2" value="<?php echo $row['sub2'];?>">
            </div>
            <div class="form-group"><input class="form-control" name="sub3" placeholder="Subject 3" value="<?php echo $row['sub3'];?>"></div>
             <div class="form-group"><input class="form-control" name="sub4" placeholder="Subject 4" value="<?php echo $row['sub4'];?>"></div>
         <div class="form-group"><input class="form-control" name="sub5" placeholder="Subject 5" value="<?php echo $row['sub5'];?>"></div>
        <div class="form-group"><input class="form-control" name="sub6" placeholder="Subject 6" value="<?php echo $row['sub6'];?>"></div>
        <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="save" style="background-color: #6665b1;">Save</button></div>
        </form>

        <?php

                if(isset( $_POST["save"])){
                
                     $semester=$_POST["semester"];
                     $sub1=$_POST["sub1"];
                     $sub2=$_POST["sub2"];
                     $sub3=$_POST["sub3"];
                     $sub4=$_POST["sub4"];
                     $sub5=$_POST["sub5"];
                     $sub6=$_POST["sub6"];

                          
                    $query="update adminsemester set id='".$_POST['id']."',semester='$semester',sub1='$sub1',sub2='$sub2',sub3='$sub3',sub4='$sub4',sub5='$sub5',sub6='$sub6' where id='".$_POST['id']."'";
                    echo $query."<br>";
                    $run=mysqli_query($conn,$query);
                    if(isset($run)){
                        echo "<script>alert('Successful!');</script>";
                        echo "<script>window.location.href='./adminsemester.php';</script>";  
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