<?php
session_start();
 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: adminlogin.php");
    exit;
}
//$conn=mysqli_connect("localhost","root","","sturms") or die("connection not established");
include("adcon.php");

if(isset($_POST['idsu']))
{
        
        $result1 = mysqli_query($conn,"select stusem.stusemid, astu.rollno, stusem.department,asem.semester from adminstusem stusem, adminstudent astu, adminsemester asem where stusem.rollno=astu.ids and stusem.sem=asem.id and stusem.stusemid='".$_POST['idsu']."'");
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
            <input type="hidden" name="idsu" value="<?php echo $row['stusemid']; ?>" />       
            
            <div class="form-group">
            <input class="form-control" name="rollno1" id="rollno1" placeholder="Roll No" value="<?php echo $row['rollno'];?>"></div>
            <div class="form-group">
            <select class="form-control" name="department1" id="department1" style="color: black" >
            <option>Department</option>  
            <option <?php if($row['department']=="COMPUTER"){echo "selected";}?>>COMPUTER</option>
            <option <?php if($row['department']=="INFORMATION TECHNOLOGY"){echo "selected";}?>>INFORMATION TECHNOLOGY</option>
            <option <?php if($row['department']=="ELECTRONICS & TELECOMMUNICATION"){echo "selected";}?>>ELECTRONICS & TELECOMMUNICATION</option>
            <option <?php if($row['department']=="ELECTRONICS"){echo "selected";}?>>ELECTRONICS</option>
            <option <?php if($row['department']=="INSTRUMENTATION"){echo "selected";}?>>INSTRUMENTATION</option> </select></div>
 
            <div class="form-group">
                <select class="form-control" name="semestersub" id="semestersub" style="color: rgb(0,0,0);">
                <option value="sem">Semester</option>
               <?php 
            $sqlqu = "select * from adminsemester";
            $resqu = mysqli_query($conn, $sqlqu);
            if(mysqli_num_rows($resqu) > 0) {
                while($rowsem = mysqli_fetch_object($resqu)) {
                    echo "<option value='".$rowsem->id."'>".$rowsem->semester."</option>";
                }
            }
            ?>
            </select></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: #6665b1;" name="savesub">Save</button></div>
        </form>

        </form>

        <?php

               if(isset( $_POST["savesub"])){
                
                     $sturn=$_POST["rollno1"];
                     $department1=$_POST["department1"];
                     $semestersub=$_POST["semestersub"];

                    $sel_ssub="select rollno,sem from adminstusem where rollno='$sturn' and sem='$semestersub';";
                    $run_ssub=mysqli_query($conn,$sel_ssub);
                    $row_ssub=mysqli_num_rows($run_ssub);
                        
                        if($row_ssub >0){
                        echo "<script>alert('Semester is already assigned to the Student! Choose another Roll No.');</script>";
                        echo "<script>window.location.href='./admineditstusem.php';</script>";  
                        }
                    else{ 
             
                    $query="update adminstusem set department='$department1',sem='$semestersub' where stusemid='".$_POST['idsu']."'";
                  
                    $run=mysqli_query($conn,$query);
                    if(isset($run)){
                        echo "<script>alert('Successful!');</script>";
                        //echo $query."<br>";
                        echo "<script>window.location.href='./adminstudent.php';</script>";  
                     }
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