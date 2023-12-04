<?php
session_start();
 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: adminlogin.php");
    exit;
}
//$conn=mysqli_connect("localhost","root","","sturms") or die("connection not established");
include("adcon.php");

if(isset($_POST['idsmptr']))
{
        
        $result1 = mysqli_query($conn,"select stusemptr.stdptr, astu.rollno, stusemptr.department,asem.semester,stusemptr.pointer from adminstudentptr stusemptr, adminstudent astu, adminsemester asem where stusemptr.rollno=astu.ids and stusemptr.semester=asem.id and stusemptr.stdptr='".$_POST['idsmptr']."'");
        $row = mysqli_fetch_assoc($result1);
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
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="js.js"></script>
</head>

<body style="background-image: url('assets/img/bgn.jpg');background-size: cover;">
    
<div>
     <div class="iconbar-right" style="margin-top: -38px;float: right;margin-right: 20px"> <button class="btn btn-primary btn-block" style="background-color: #6665b1;" href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></button></div>
    <div class="login-clean">
        <form class="shadow" method="post" style="max-width: 480px;">
            
            <h3 class="text-uppercase text-center justify-content-center " style="color: black">Update Semester</h3><br>
            <input type="hidden" name="idsmptr" value="<?php echo $row['stdptr']; ?>" />       
            
            <div class="form-group">
            <input class="form-control" name="rollno1" id="rollno1" placeholder="Roll No" value="<?php echo $row['rollno'];?>" disabled></div>
            <div class="form-group">
                  <input class="form-control" name="rollno1" id="rollno1" placeholder="Roll No" value="<?php echo $row['department'];?>" disabled>
           </div>
 
            <div class="form-group">
           <input class="form-control" name="rollno1" id="rollno1" placeholder="Roll No" value="<?php echo $row['semester'];?>" disabled></div>
             <div class="form-group"><input class="form-control"  name="semptr" placeholder="Pointer" value="<?php echo $row['pointer'];?>"></div>
           
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: #6665b1;" name="savestusemptr">Save</button></div>
        </form>

        </form>

        <?php

               if(isset( $_POST["savestusemptr"])){
                
                    
                     $semptr=$_POST["semptr"];

                    $query="update adminstudentptr set pointer='$semptr' where stdptr='".$_POST['idsmptr']."'";
                  
                    $run=mysqli_query($conn,$query);
                    if(isset($run)){
                        echo "<script>alert('Successful!');</script>";
                        //echo $query."<br>";
                        echo "<script>window.location.href='./adminstudent.php';</script>";  
                     }
                
            }
            ?>       
        
        </div>
</div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>
</html>