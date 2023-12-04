<?php
session_start();

  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: studentlogin.php");
    exit;
}
include("adcon.php");

//echo $_POST['idr'];
//$conn=mysqli_connect("localhost","root","","sturms") or die("connection not established");

if(isset($_POST['idr']))
{
        
        $result = mysqli_query($conn,"SELECT * from marks where idm='".$_POST['idr']."'");
        $rows = mysqli_fetch_assoc($result);
        //echo $_POST['idr'];
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
     <div class="iconbar-right" style="margin-top: -38px;float: right;margin-right: 20px"> <button class="btn btn-primary btn-block" style="border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); background-color: #6665b1;" href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></button></div>
    <div class="login-clean">
        <form class="shadow" method="post" style="max-width: 480px;">
            
            <h3 class="text-uppercase text-center justify-content-center " style="color: black">Update Marks</h3><br>
             <input type="hidden" name="idr" value="<?php echo $rows['idm']; ?>" />
              <div class="form-group"><input class="form-control" name="rollno" placeholder="Roll no" value="<?php echo $rows['rollno'];?>" disabled></div>
               <div class="form-group"><input class="form-control" name="name" placeholder="Name" value="<?php echo $rows['name'];?>" disabled></div>
                
           <div class="form-group"><input class="form-control" name="dept" placeholder="Department" value="<?php echo $rows['dept'];?>" disabled></div>
             
            
             <div class="form-group">

             <select class="form-control" name="Semester" style="color: rgb(0,0,0);" >
                <optgroup label="Semester">
                <option <?php if($rows['Semester']=="SEM I"){echo "selected";}?>>SEM I</option>
                <option <?php if($rows['Semester']=="SEM II"){echo "selected";}?>>SEM II</option>
                <option <?php if($rows['Semester']=="SEM III"){echo "selected";}?>>SEM III</option>
                <option <?php if($rows['Semester']=="SEM IV"){echo "selected";}?>>SEM IV</option>
                <option <?php if($rows['Semester']=="SEM V"){echo "selected";}?>>SEM V</option>
                <option <?php if($rows['Semester']=="SEM VI"){echo "selected";}?>>SEM VI</option>
                <option <?php if($rows['Semester']=="SEM VII"){echo "selected";}?>>SEM VII</option>
                <option <?php if($rows['Semester']=="SEM VIII"){echo "selected";}?>>SEM VIII</option>
            </optgroup></select>
            </div>
            <div class="form-group"><input class="form-control" name="sub" placeholder="Subject " value="<?php echo $rows['sub'];?>"></div>
            <div class="form-group"><input class="form-control" name="m1" placeholder="IA-1" value="<?php echo $rows['m1'];?>">
            </div>
            <div class="form-group"><input class="form-control" name="m2" placeholder="IA-2" value="<?php echo $rows['m2'];?>"></div>
             
        <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="save" style="background-color: #6665b1;">Save</button></div>
        </div>
        </form>

        <?php

                if(isset( $_POST["save"]))
                {
                
                     //$rollno=$_POST["rollno"];
                     //$name=$_POST["name"];
                    
                     //$dept=$_POST["dept"];

                     //$Semester=$_POST["Semester"];

                     $sub=$_POST["sub"];
                     $m1=$_POST["m1"];
                     $m2=$_POST['m2'];

                    $query="update marks set sub='$sub',m1='$m1',m2='$m2' where idm='".$_POST['idr']."'";
                    
                    //echo $query."<br>";
                    
                    $run=mysqli_query($conn,$query);
                    
                    if(isset($run)){
                        echo "<script>alert('Successful!');</script>";
                        echo "<script>window.location.href='./add_marks.php';</script>";  
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