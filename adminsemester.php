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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
   <link rel="stylesheet" href="assets/css/maincss.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
   
</head>

<body style="background-image: url('assets/img/bgn.jpg');background-size: cover;">
    
<div>
    <ul class="nav nav-tabs">
        <a class="btn btn-primary btn-block" style="background-color: #6665b1;width:120px;margin-top: 5px; margin-left: 10px;border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);" href="admindashboard.php"> &nbsp;<b>Dashboard</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <li class="nav-item"><a role="tab" data-toggle="tab" class="nav-link active " href="#tab-1"><strong>Add Subjects</strong></a></li>
        <li class="nav-item"><a role="tab" data-toggle="tab" class="nav-link " href="#tab-2"><strong>Manage Subjects
        </strong></a></li>
    </ul> <div style="float:right; margin-top: -38px;float: right;margin-right: 20px;"><a class="btn btn-primary" style="background-color: #6665b1;border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); " href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></a></div>
    
    <div class="tab-content">
        <div class="tab-pane active " role="tabpanel" id="tab-1">
            <div class="login-clean">
        <form class="shadow" method="post" style="max-width: 480px;">
            
            <h3 class="text-uppercase text-center justify-content-center " style="color: black">Add Subjects</h3><br>
            <div class="form-group">
            <select class="form-control" name="semester" id='semester' style="color: rgb(0,0,0);"><option>Semester</option><option value="SEM I">SEM I</option><option value="SEM II">SEM II</option><option value="SEM III">SEM III</option><option value="SEM IV">SEM IV</option><option value="SEM V">SEM V</option><option value="SEM VI">SEM VI</option><option value="SEM VII">SEM VII</option><option value="SEM VIII">SEM VIII</option></select>
            </div>
            <div class="form-group"><input class="form-control" name="sub1" placeholder="Subject 1" required></div>
            <div class="form-group"><input class="form-control" name="sub2" placeholder="Subject 2" required></div>
            <div class="form-group"><input class="form-control" name="sub3" placeholder="Subject 3" required></div>
            <div class="form-group"><input class="form-control" name="sub4" placeholder="Subject 4" required></div>
            <div class="form-group"><input class="form-control" name="sub5" placeholder="Subject 5" required></div>
            <div class="form-group"><input class="form-control" name="sub6" placeholder="Subject 6" required></div>
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
                          
              $query="insert into adminsemester values(' ','$semester','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6');";
              
                    $run=mysqli_query($conn,$query);
                    if(isset($run)){
                        echo "<script>alert('Successful!');</script>";
                        echo "<script>window.location.href='./adminsemester.php';</script>";  
                     }
                }
            ?>
        </div>
        </div>
        <div class="tab-pane " role="tabpanel" id="tab-2">
           <div class="col-md-12 search-table-col">
        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div>
        <div class="table-responsive table-bordered table table-hover table-bordered results">
            <table class="table table-bordered table-hover" style="background-color: white">
                <thead class="bill-header cs">
                    <tr> 
                    <th id="trs-hd" >Semester</th>
                        <th id="trs-hd" >Subject 1</th>
                        <th id="trs-hd" >Subject 2</th>
                        <th id="trs-hd" >Subject 3</th>
                        <th id="trs-hd" >Subject 4</th>
                        <th id="trs-hd" >Subject 5</th>
                        <th id="trs-hd" >Subject 6</th>
                        <th id="trs-hd" style="width: 140px">Action</th>
                    </tr>
                </thead>
                 
                <tbody>
            <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr> 
                   
                    <?php 
            $select="select * from adminsemester order by semester asc";
            $run_s=mysqli_query($conn,$select);
            while ($row=mysqli_fetch_array($run_s)){ 
                   ?>
                    <tr>
                        <!--<td>
                            <input type="hidden" value="<?php //echo $row['semester']; ?>" name="sem"> -->
                        <td><?php echo $semester=$row['semester']; ?></td>
                        <td><?php echo $sub1=$row['sub1']; ?></td>
                        <td><?php echo $sub2=$row['sub2']; ?></td>
                        <td><?php echo $sub3=$row['sub3']; ?></td>
                        <td><?php echo $sub4=$row['sub4']; ?></td>
                        <td><?php echo $sub5=$row['sub5']; ?></td>
                        <td><?php echo $sub6=$row['sub6']; ?></td>
                        <td><center>
                            <form method="POST" action="admineditsemester.php" style="float:left;">
                            <button class="btn btn-success" style="margin-left: 5px;" value="<?php echo $row['semester']; ?>" name="id"><i class="fa fa-edit" style="font-size: 15px;"></i></button> </form>
                           <form method="POST" action="delsem.php" style="float:right;">
                            <button class="btn btn-danger" style="margin-left: 5px;" value="<?php echo $row['semester']; ?>" name="id"><i class="fa fa-trash" style="font-size: 15px;"></i></button></form>
                        </center>
                        
                    </td>
                        <!--<center><button class="btn btn-success" style="margin-left: 5px;" type="submit"><i class="fa fa-check" style="font-size: 15px;"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-danger" style="margin-left: 5px;" href='delsem.php?semester=".$row['semester']."'><i class="fa fa-trash" style="font-size: 15px;"></i></a>
                            
                        </center></td>-->
                    </tr><?php } ?>
                    
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