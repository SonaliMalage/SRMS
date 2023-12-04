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
     <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="js.js"></script>
<script>
    function myFunction(){
        var departmentp = $('#rollnop').find(':selected').data('departmentp');
        var dept1 = $('#srn').find(':selected').data('dept1');
        $('#departmentp').val(departmentp);
        $('#dept1').val(dept1);
    }
</script>
</head>

<body style="background-image: url('assets/img/bgn.jpg');background-size: cover;">
<div>

    <ul class="nav nav-tabs" ><a class="btn btn-primary btn-block" style="background-color: #6665b1;width:120px;margin-top: 5px; margin-left: 10px;border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);" href="admindashboard.php"> &nbsp;<b>Dashboard</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1"><strong>Add Student</strong></a></li>
        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2"><strong>Manage Student</strong></a></li>
        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3"><strong>Assign Semesters</strong></a></li>
        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-4"><strong>Manage Semesters</strong></a></li>
        <li class="nav-item"><a class="nav-link " role="tab" data-toggle="tab" href="#tab-5"><strong>Add Semester Results</strong></a></li>
        <li class="nav-item"><a class="nav-link " role="tab" data-toggle="tab" href="#tab-6"><strong>Manage Semester Results</strong></a></li>
    </ul><div style="float:right; margin-top: -38px;float: right;margin-right: 20px;"><a class="btn btn-primary" style="background-color: #6665b1;border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); " href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></a></div>

    <div class="tab-content" >
        <div class="tab-pane active" role="tabpanel" id="tab-1">

          <div class="login-clean">

        <form class="shadow" method="post" style="max-width: 480px;">

            <h3 class="text-uppercase text-center justify-content-center " style="color: black">Add Student</h3><br>
           
            <div class="form-group"><input class="form-control"  name="rollno" placeholder="Roll No" required></div>
            <div class="form-group"><input class="form-control"  name="name" placeholder="Name" required></div>
            <div class="form-group">
            <select class="form-control" name="department" style="color: black" >
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
            <div class="form-group"><input class="form-control" name="mobileno" pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9" placeholder="Mobile No" required></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="savedata" style="background-color: #6665b1;">Save</button></div>
        </form>

        <?php
                if(isset( $_POST["savedata"])){
                     $rollno=$_POST["rollno"];
                     $name=$_POST["name"];
                     $department=$_POST["department"];
                     $year=$_POST["year"];
                     $mobileno=$_POST["mobileno"];
                     $email=$_POST["email"];
                     $password=$_POST["password"];
                     $password1=md5($password);

                    $sel_u="select rollno from adminstudent where rollno='$rollno';";
                    $sel_u2="select email from adminstudent where email='$email';";
                    $run_u=mysqli_query($conn,$sel_u);
                    $run_u2=mysqli_query($conn,$sel_u2);
                    $row_sub1=mysqli_num_rows($run_u);
                    $row_sub2=mysqli_num_rows($run_u2);
                        
                  // if($row_sub1 >0){

                    if($row_sub1 >0){
                        
                        echo "<script>alert(' Roll No already exist. Choose another Roll No!');</script>";
                        echo "<script>window.location.href='./adminstudent.php';</script>";  
                        }
                      else if($row_sub2 >0){
                        echo "<script>alert(' Email ID already exist. Choose another Email ID!');</script>";
                        echo "<script>window.location.href='./adminstudent.php';</script>";  
                        }
                   // }
                        
                        else{
              $query="insert into adminstudent values(' ','$rollno','$name','$department','$year','$mobileno','$email','$password1');";
                    //echo $query."<br>";
                    $run=mysqli_query($conn,$query);
                    if(isset($run)){
                        echo "<script>alert('Successful!');</script>";
                        echo "<script>window.location.href='./adminstudent.php';</script>";  
                     }
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

        <div class="tab-pane" role="tabpanel" id="tab-3" >
          <div class="login-clean">
            <form class="shadow" method="post" style="max-width: 480px;">

            <h3 class="text-uppercase text-center justify-content-center" style="color: black; ">Assign Semester </h3><br>
             <div class="form-group">
                <select class="form-control" onchange="myFunction()" name="srn" id="srn" style="color: rgb(0,0,0);">
                <option value="">Roll No</option>
            <?php 
             $sqlrid = "SELECT * FROM adminstudent order by rollno asc";
             $resultrid = mysqli_query($conn,$sqlrid); 
               
            while ($row3 = mysqli_fetch_array($resultrid)) {
            echo "<option data-dept1='".$row3['department']."' value='" . $row3['ids'] . "'>" . $row3['rollno'] . "</option>";} 
             ?>
            </select></div>
            <div class="form-group">
          <input class="form-control" type="text" name="dept1" id="dept1" placeholder="Department" required>
            </div>
 
            <div class="form-group">
                <select class="form-control" name="semestersub" id="semestersub" style="color: rgb(0,0,0);">
                <option value="sem">Semester</option>
               <?php 
            $sqlqu = "select * from adminsemester order by semester";
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

        <?php
                if(isset( $_POST["savesub"])){
                
                     $sturn=$_POST["srn"];
                     $department1=$_POST["dept1"];
                     $semestersub=$_POST["semestersub"];

                    $sel_ssub="select rollno from adminstusem where rollno='$sturn';";
                    $run_ssub=mysqli_query($conn,$sel_ssub);
                    $row_ssub=mysqli_num_rows($run_ssub);
                        
                        if($row_ssub >0){
                        echo "<script>alert('Semester is already assigned to the Student! Choose another Roll No.');</script>";
                        echo "<script>window.location.href='./adminstudent.php';</script>";  
                        }
                    else{
              
            $queryssu="insert into adminstusem values(' ','$sturn','$department1','$semestersub');";
                   
                    $runssu=mysqli_query($conn,$queryssu);
                    if(isset($runssu)){
                        echo "<script>alert('Successful!');</script>";
                        echo "<script>window.location.href='./adminstudent.php';</script>";  
                     }
                }
            
            }
            ?>

        </div>
        </div>

        <div class="tab-pane" role="tabpanel" id="tab-4">
           <div class="col-md-12 search-table-col">
        <div class="form-group pull-right col-lg-4"><input type="text" class="search1 form-control" placeholder="Search by typing here.."></div>
        <div class="table-responsive table-bordered table table-hover table-bordered results">
            <table class="table table-bordered table-hover" style="background-color: white">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd">Roll No</th>
                        <th id="trs-hd">Name</th>
                        <th id="trs-hd">Department</th>
                        <th id="trs-hd">Semester</th>
                        <th id="trs-hd" style="width: 140px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
            <?php 
            $select1="select stusem.stusemid,astu.rollno,astu.name,stusem.department,asem.semester from adminstusem stusem, adminstudent astu, adminsemester asem where stusem.rollno=astu.ids and stusem.sem=asem.id order by rollno asc";
          
            $run21=mysqli_query($conn,$select1);
            while ($row1=mysqli_fetch_array($run21)){
            ?>
          
                    <tr>
                        <td><?php echo $ID=$row1["rollno"]; ?></td>
                        <td><?php echo $name=$row1["name"]; ?></td>
                        <td><?php echo $department=$row1["department"]; ?></td>
                        <td><?php echo $semester=$row1["semester"]; ?></td>
                         <td><center>
                            <form method="POST" action="admineditstusem.php" style="float:left;">
                            <button class="btn btn-success" style="margin-left: 5px;" value="<?php echo $row1['stusemid']; ?>" name="idsu"><i class="fa fa-edit" style="font-size: 15px;"></i></button> </form>
                           <form method="POST" action="delstusm.php" style="float:right;">
                            <button class="btn btn-danger" style="margin-left: 5px;" value="<?php echo $row1['stusemid']; ?>" name="idsu"><i class="fa fa-trash" style="font-size: 15px;"></i></button></form>
                        </center>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
        </div>

        <div class="tab-pane" role="tabpanel" id="tab-5" >
          <div class="login-clean">
            <form class="shadow" method="post" style="max-width: 480px;">

            <h3 class="text-uppercase text-center justify-content-center" style="color: black; ">Add Result</h3><br>
             <div class="form-group">
                <select class="form-control" onchange="myFunction()" name="rollnop" id="rollnop" style="color: rgb(0,0,0);">
                <option value="">Roll No</option>
           <?php 
             $sqlridd = "SELECT * FROM adminstudent order by rollno asc";
             $resultridd = mysqli_query($conn,$sqlridd); 
               
            while ($row4 = mysqli_fetch_array($resultridd)) {
            echo "<option data-departmentp='".$row4['department']."' value='" . $row4['ids'] . "'>" . $row4['rollno'] . "</option>";} 
             ?>
            </select></div>
            <div class="form-group">
          <input class="form-control" type="text" name="departmentp" id="departmentp" placeholder="Department" required>
            </div>
            
            <div class="form-group">
                <select class="form-control" name="semesterp" id="semesterp" style="color: rgb(0,0,0);">
                <option value="sem">Semester</option>
               <?php 
            $sqlqu = "select * from adminsemester order by semester";
            $resqu = mysqli_query($conn, $sqlqu);
            if(mysqli_num_rows($resqu) > 0) {
                while($rowsem = mysqli_fetch_object($resqu)) {
                    echo "<option value='".$rowsem->id."'>".$rowsem->semester."</option>";
                }
            }
            ?>
            </select></div>
             <div class="form-group"><input class="form-control" type="number" min="0" max="10" name="semptr" placeholder="Pointer" required></div>
           
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: #6665b1;" name="saveptr1">Save</button></div>
        </form>
 <?php
                if(isset( $_POST["saveptr1"])){
                
                    $sturnp=$_POST["rollnop"];
                    $departmentp1=$_POST["departmentp"];
                    $semesterp=$_POST["semesterp"];
                    $stuptr=$_POST["semptr"];

                    $sel_ssubp="select rollno, semester from adminstudentptr where rollno='$sturn' and semester='$semesterp';";
                    $run_ssubp=mysqli_query($conn,$sel_ssubp);
                    $row_ssubp=mysqli_num_rows($run_ssubp);
                        
                        if($row_ssubp >0){
                        echo "<script>alert('Pointer is already assigned to the Semester! Choose another Semester.');</script>";
                        echo "<script>window.location.href='./adminstudent.php';</script>";  
                        }
                    else{
              
            $queryssup="insert into adminstudentptr values(' ','$sturnp','$departmentp1','$semesterp','$stuptr');";
                   
                    $runssup=mysqli_query($conn,$queryssup);
                    if(isset($runssup)){
                        echo "<script>alert('Successful!');</script>";
                        echo "<script>window.location.href='./adminstudent.php';</script>";  
                     }
                }
            
            }
            ?>

        </div>
        </div>

        <div class="tab-pane" role="tabpanel" id="tab-6">
           <div class="col-md-12 search-table-col">
        <div class="form-group pull-right col-lg-4"><input type="text" class="search2 form-control" placeholder="Search by typing here.."></div>
        <div class="table-responsive table-bordered table table-hover table-bordered results">
            <table class="table table-bordered table-hover" style="background-color: white">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd">Roll No</th>
                        
                        <th id="trs-hd">Department</th>
                        <th id="trs-hd">Semester</th>
                        <th id="trs-hd">Pointer</th>
                          <th id="trs-hd" style="width: 140px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>

            <?php 
            $selectp="select stusemptr.stdptr, astu.rollno, stusemptr.department,asem.semester,stusemptr.pointer from adminstudentptr stusemptr, adminstudent astu, adminsemester asem where stusemptr.rollno=astu.ids and stusemptr.semester=asem.id order by rollno,semester asc ";
            $run_sp=mysqli_query($conn,$selectp);
            while ($rowp=mysqli_fetch_array($run_sp)){
            ?>
          
                    <tr>
                        <td><?php echo $ID=$rowp["rollno"]; ?></td>
                        <td><?php echo $department=$rowp["department"]; ?></td>
                        <td><?php echo $semester=$rowp["semester"]; ?></td>
                        <td><?php echo $name=$rowp["pointer"]; ?></td>
                         <td><center>
                            <form method="POST" action="admineditsemptr.php" style="float:left;">
                            <button class="btn btn-success" style="margin-left: 5px;" value="<?php echo $rowp['stdptr']; ?>" name="idsmptr"><i class="fa fa-edit" style="font-size: 15px;"></i></button> </form>
                           <form method="POST" action="delsmptr.php" style="float:right;">
                            <button class="btn btn-danger" style="margin-left: 5px;" value="<?php echo $rowp['stdptr']; ?>" name="idsmptr"><i class="fa fa-trash" style="font-size: 15px;"></i></button></form>
                        </center>
                        </td>
                    </tr>
                    <?php } ?>
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