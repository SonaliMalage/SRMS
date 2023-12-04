<?php
 session_start();
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: teacherindex.php");
    exit;
}
 include("adcon.php");


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

    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/js1.js"></script>
<script>
    function myFunction(){
        var name = $('#rollno').find(':selected').data('name');
        var department = $('#rollno').find(':selected').data('department');
        $('#name').val(name);
        $('#department').val(department);
    }
</script>
</head>

<body style="background-image: url('assets/img/bgn.jpg');background-size: cover;"><ul class="nav nav-tabs" >
  <a class="btn btn-primary btn-block" style="border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);  background-color: #6665b1;width:120px;margin-top: 5px; margin-left: 10px;" href="Teacherdashboard.php"> &nbsp;<b>Dashboard</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1"><b>Add Marks</b></a></li>
        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2"><b>Manage Marks</b></a></li>
    </ul>
    <div style="float:right; margin-top: -38px;float: right;margin-right: 20px;"><a class="btn btn-primary" style="border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);  background-color: #6665b1; " href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></a></div>
   
    <div class="tab-content">
        <div class="tab-pane active" role="tabpanel" id="tab-1">

        <div class="login-clean"> 
        <form action="" class="shadow" method="post" style="max-width: 480px;">

            <h3 class="text-uppercase text-center justify-content-center " style="color: black">Add Marks</h3><br>
                   <div class="form-group">
         <select class="form-control" name="rollno" id="rollno" onchange="myFunction()" style="color: rgb(0,0,0);">
              
            <option value='' selected>Roll No</option>
            <?php 
            $sqlqu1 = "SELECT astud.rollno,astud.department ,astud.name from adminstudent astud, adminteacher ate, adminsemester s, adminstusem adst, adminsubjects adsb where adst.rollno = astud.ids and s.id=adsb.semid and adst.sem= adsb.semid and adsb.teacherid=ate.idt and ate.idt ='".$_SESSION['idt']."'";
            $resqu1 = mysqli_query($conn, $sqlqu1);
            if(mysqli_num_rows($resqu1) > 0) {
                while($rowsem1 = mysqli_fetch_object($resqu1)) {
                    echo "<option data-name='".$rowsem1->name."' data-department='".$rowsem1->department."' value='".$rowsem1->rollno."'>".$rowsem1->rollno."</option>";
                }
            }
            ?>
        </select></div>
            
             <div class="form-group"><input class="form-control" type="text" name="name" id="name"placeholder="Name" required></div>
             
            <div class="form-group">
          <input class="form-control" type="text" name="department" id="department" placeholder="Department" required>
            </div>
              <div class="form-group">
         <select class="form-control" name="semestersub" id="semestersub" style="color: rgb(0,0,0);">
              
            <option value='' selected>Semester</option>
            <?php 
            $sqlqu = "select s.id,s.semester from adminteacher ate, adminsemester s,  adminsubjects adsb where s.id=adsb.semid and adsb.teacherid=ate.idt and adsb.department='".$_SESSION['department']."' and email= '".$_SESSION['email']."' order by s.semester";
            $resqu = mysqli_query($conn, $sqlqu);
            if(mysqli_num_rows($resqu) > 0) {
                while($rowsem = mysqli_fetch_object($resqu)) {
                    echo "<option value='".$rowsem->id."'>".$rowsem->semester."</option>";
                }
            }
            ?>
        </select></div>
        
        <div class="form-group">
        <select class="form-control" size="1" name="selsub" id="selsub" style="color: rgb(0,0,0);">
        <option selected>Subject</option></select></div>

             <div class="form-group"><input class="form-control" type="number" name="m1" placeholder="IA-1" min="0" max="30" title="Marks should be in the range of 0-30!" required></div>
             <div class="form-group"><input class="form-control" type="number" name="m2" placeholder="IA-2" min="0" max="30" title="Marks should be in the range of 0-30!" required></div>
   
                <div class="form-group"><input type="submit" name="addmarks" value="Save" class="btn btn-primary btn-block" type="submit" style="background-color: #6665b1; "></div>
        </form>

                <?php

                
                if(isset( $_POST["addmarks"])){

                   
                     
                     $rollno=$_POST['rollno'];
                     $name=$_POST["name"];
                     
                     $dept=$_POST["dept"];
                     $Semester=$_POST["semestersub"];
                     $sub=$_POST['selsub'];
                     $m1=$_POST['m1'];
                     $m2 = $_POST['m2'];

                    $query="insert into marks values(' ','$rollno','$name','$dept','$Semester','$sub','$m1','$m2');";
              
                    $run=mysqli_query($conn,$query);
                    if(isset($run)){
                        echo "<script>alert('Successful!');</script>";
                        echo "<script>window.location.href='add_marks.php';</script>";  
                     }
                }
            ?>
    </div>
        </div>

         <div class="tab-pane" role="tabpanel" id="tab-2">
           <div class="col-md-12 search-table-col">
        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div>
        <div class="table-responsive table-bordered table table-hover table-bordered results">
            <table class="table table-bordered table-hover"  style="background-color: white">
                <thead class="bill-header cs">
                    <tr>
               
                        <th id="trs-hd">Roll No</th>
                         <th id="trs-hd">Name</th>
                       
                        <th id="trs-hd">Department</th>
                        <th id="trs-hd">Semester</th>
                        <th id="trs-hd">Subject</th>
                        <th id="trs-hd">IA-1</th>

                        <th id="trs-hd">IA-2</th>
                                             
                        <th id="trs-hd" style="width: 140px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>

                    <?php 
                     $query="select m.idm,m.rollno,m.name,m.dept,s.semester,m.sub,m.m1,m.m2 from marks m, adminteacher ate, adminsemester s,  adminsubjects adsb where s.id=adsb.semid and m.Semester=s.id and adsb.teacherid=ate.idt and adsb.department='".$_SESSION['department']."' and email= '".$_SESSION['email']."' and m.sub=adsb.subject order by s.semester"; 
                    $result=mysqli_query($conn,$query); 
                   while($rows=mysqli_fetch_assoc($result)) 
                    { 
                    ?> 
                
                    <tr>
                        <td><?php echo $rollno=$rows['rollno']; ?></td>
                        <td><?php echo $name=$rows['name']; ?></td>
                        <td><?php echo $dept=$rows['dept']; ?></td>
                        
                        <td><?php echo $Semester=$rows['semester']; ?></td>
                        <td><?php echo $dept=$rows['sub']; ?></td>
                        <td><?php echo $m1=$rows['m1']; ?></td>
                        <td><?php echo $m2=$rows['m2']; ?></td>
                       
                        <td><center>
                            <form method="POST" action="ed.php" style="float:left;">
                            <button class="btn btn-success" value ="<?php echo $rows['idm']; ?>" name= "idr" style="margin-left: 5px;"><i class="fa fa-edit" style="font-size: 15px;"></i></button> </form>
                           
                            <form method="POST" action="delete1.php" style="float:right;">
                            <button class="btn btn-danger" style="margin-left: 5px;" value="<?php echo $rows['idm']; ?>" name="idr"><i class="fa fa-trash" style="font-size: 15px;"></i></button></form>
                        </center></td>
                    </tr><?php } ?>
                    
                </tbody>
            </table>
        </center>

                                    
        </div>
        </div>
        </div>
    </div>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
