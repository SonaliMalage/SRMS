<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: adminlogin.php");
    exit;
}
//$conn=mysqli_connect("localhost","root","","sturms") or die("connection not established");
include "adcon.php";
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
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
   <link rel="stylesheet" href="assets/css/maincss.css">
</head>

<body  style="background-image: url('assets/img/bgn.jpg');background-size: cover;">
<div>
    <ul class="nav nav-tabs" >
        <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1"><strong>Add Student</strong></a></li>
        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2"><strong>Manage Student</strong></a></li>
    </ul><div style="float:right; margin-top: -38px;float: right;margin-right: 20px;"><a class="btn btn-primary" style="background-color: #6665b1; " href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></a></div>

    <div class="tab-content" >
        <div class="tab-pane active" role="tabpanel" id="tab-1">

          <div class="login-clean">

        <form class="shadow" method="post" style="max-width: 480px;">

            <h3 class="text-uppercase text-center justify-content-center " style="color: black">Add Student</h3><br>
           
            <div class="form-group"><input class="form-control"  name="rollno" placeholder="Roll No"></div>
            <div class="form-group"><input class="form-control"  name="name" placeholder="Name"></div>
            <div class="form-group">
            <select class="form-control" name="department" style="color: black">
            <option> Department</option>
            <option value="COMPUTER">COMPUTER</option>
            <option value="INFORMATION TECHNOLOGY">INFORMATION TECHNOLOGY</option>
            <option value="ELECTRONICS & TELECOMMUNICATION">ELECTRONICS & TELECOMMUNICATION</option>
            <option value="ELECTRONICS">ELECTRONICS</option>
            <option value="INSTRUMENTATION">INSTRUMENTATION</option>
            </select></div>
            <div class="form-group">
            <select class="form-control" name="year" style="color: black">
            <option>Year</option> 
            <option value="First Year">First Year</option>
            <option value="Second Year">Second Year</option>
            <option value="Third Year">Third Year</option>
            <option value="BE">BE</option>
            </select></div>
            <div class="form-group"><input class="form-control" name="mobileno" placeholder="Mobile No"></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="save" style="background-color: #6665b1;">Save</button></div>
        </form>


        <?php
                if(isset( $_POST["save"])){
                
                     $rollno=$_POST["rollno"];
                     $name=$_POST["name"];
                     $department=$_POST["department"];
                     $year=$_POST["year"];
                     $mobileno=$_POST["mobileno"];
                     $email=$_POST["email"];
                     $password=$_POST["password"];

                     $password1=md5($password);

                    $sel_u="select * from adminstudent;";
                    $run_u=mysqli_query($conn,$sel_u);
                    while($row_u=mysqli_fetch_assoc($run_u)){
                        
                        if($rollno==$row_u['rollno']){
                        echo "<script>alert(' Roll No already exist. Choose another Roll No!');</script>";
                        echo "<script>window.location.href='./adminstudent.php';</script>";  
                        }
                        if($email==$row_u['email']){
                        echo "<script>alert(' Email ID already exist. Choose another Email ID!');</script>";
                        echo "<script>window.location.href='./adminstudent.php';</script>";  
                        }}
                          
              $query="insert into adminstudent values(' ','$rollno','$name','$department','$year','$mobileno','$email','$password1');";
                    echo $query."<br>";
                    $run=mysqli_query($conn,$query);
                    if(isset($run)){
                        echo "<script>alert('Successful!');
                        </script>";
                        echo "<script>window.location.href='./adminstudent.php';</script>";  
                     }
                }
            
            ?>

    </div>
        </div>
        <div class="tab-pane" role="tabpanel" id="tab-2">
           <div class="col-md-12 search-table-col">
        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
        <div class="table-responsive table-bordered table table-hover table-bordered results">
            <table class="table table-bordered table-hover"  style="background-color: white">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd">Roll No</th>
                        <th id="trs-hd">Name</th>
                        <th id="trs-hd">Department</th>
                        <th id="trs-hd">Year</th>
                        <th id="trs-hd">Mobile No</th>
                        <th id="trs-hd">email</th>
                       
                        <th id="trs-hd" style="width: 140px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>

            <?php 
            $select="select * from adminstudent order by rollno asc";
            $run_s=mysqli_query($conn,$select);
            while ($row=mysqli_fetch_array($run_s)){
            ?>
                    <tr>
                        <td><?php echo $rollno=$row["rollno"]; ?></td>
                        <td><?php echo $name=$row["name"]; ?></td>
                        <td><?php echo $department=$row["department"]; ?></td>
                        <td><?php echo $year=$row["year"]; ?></td>
                        <td><?php echo $mobileno=$row["mobileno"]; ?></td>
                        <td><?php echo $email=$row["email"]; ?></td>
                        
                        <td><center>
                            <form method="POST" action="admineditstudent.php" style="float:left;">
                            <button class="btn btn-success" style="margin-left: 5px;" value="<?php echo $row['rollno']; ?>" name="ids"><i class="fa fa-edit" style="font-size: 15px;"></i></button> </form>
                           <form method="POST" action="delstudent.php" style="float:right;">
                            <button class="btn btn-danger" style="margin-left: 5px;" value="<?php echo $row['rollno']; ?>" name="ids"><i class="fa fa-trash" style="font-size: 15px;"></i></button></form>
                        </center>
                    </td>
                    </tr>  <?php } ?>

                </tbody>
            </table>
        </div>
        </div>
        </div>
    </div>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>