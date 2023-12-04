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
     <!--<style>
        a.active.nav-link{background-color: #e1e1e1!important;}
    </style>-->
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="js.js"></script>

</head>
<body style="background-image: url('assets/img/bgn.jpg');background-size: cover;">

    <div>
    <ul class="nav nav-tabs"><a class="btn btn-primary btn-block" style="background-color: #6665b1;width:120px;margin-top: 5px; margin-left: 10px;border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);" href="admindashboard.php"> &nbsp;<b>Dashboard</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1"><strong>Add Teacher</strong></a></li>
        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2"><strong>Manage Teacher</strong></a></li>
        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3"><strong>Assign Subjects</strong></a></li>
        <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-4"><strong>Manage Subjects</strong></a></li>
    </ul><div style="float:right; margin-top: -38px;float: right;margin-right: 20px;"><a class="btn btn-primary" style="background-color: #6665b1;border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); " href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></a></div>

    <div class="tab-content" >
        <div class="tab-pane active" role="tabpanel" id="tab-1" >
          <div class="login-clean">
            <form class="shadow" method="post" style="max-width: 480px;">

            <h3 class="text-uppercase text-center justify-content-center" style="color: black; ">Add Teacher</h3><br>
     
            <div class="form-group"><input class="form-control" name="name" placeholder="Name" required></div>
            <div class="form-group"><input class="form-control" name="ID" placeholder="ID" required></div>
            <div class="form-group">
            <select class="form-control" name="department" style="color: black">
            <option>Department</option>  
            <option value="COMPUTER">COMPUTER</option>
            <option value="INFORMATION TECHNOLOGY">INFORMATION TECHNOLOGY</option>
            <option value="ELECTRONICS & TELECOMMUNICATION">ELECTRONICS & TELECOMMUNICATION</option>
            <option value="ELECTRONICS">ELECTRONICS</option>
            <option value="INSTRUMENTATION">INSTRUMENTATION</option>
            </select></div>
            <div class="form-group"><input class="form-control" type="tel" name="mobileno" placeholder="Mobile No" pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9" required></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: #6665b1;" name="save">Save</button></div>
        </form>

        <?php
                if(isset( $_POST["save"])){
                
                     $name=$_POST["name"];
                     $ID=$_POST["ID"];
                     $department=$_POST["department"];
                     $mobileno=$_POST["mobileno"];
                     $email1=$_POST["email"];
                     $password=$_POST["password"];

                     $password1=md5($password);

                    $sel1="select * from adminteacher where ID='$ID' OR email='$email';";
                    $run1=mysqli_query($conn,$sel1);

                    $row111=mysqli_num_rows($run1);
                        
                        if($row111 >0){
                       
                        while($row1=mysqli_fetch_assoc($run1)){                        
                        if($ID==$row1['ID']){
                        echo "<script>alert(' ID already exist. Choose another ID!');</script>";
                        echo "<script>window.location.href='./adminteacher.php';</script>";  
                        } 
                        elseif($email1==$row1['email']){
                        echo "<script>alert(' Email ID already exist. Choose another Email ID!');</script>";
                        echo "<script>window.location.href='./adminteacher.php';</script>";  
                        }}}//}
                       
                       else{
                          $query="insert into adminteacher values(' ','$name','$ID','$department','$mobileno','$email1','$password1');";
                             //echo $query."<br>";
                            $run=mysqli_query($conn,$query);
                            if(isset($run)){
                                echo "<script>alert('Successful!');</script>";
                                echo "<script>window.location.href='./adminteacher.php';</script>";         
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
            <table class="table table-bordered table-hover" style="background-color: white">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd">ID</th>
                        <th id="trs-hd">Name</th>
                        <th id="trs-hd">Department</th>
                        <th id="trs-hd">Mobile No</th>
                        <th id="trs-hd">Email</th>
                        <th id="trs-hd" style="width: 140px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>

            <?php 
            $selectt="select * from adminteacher order by ID asc";
            $run2=mysqli_query($conn,$selectt);
            while ($rowt=mysqli_fetch_array($run2)){
            ?>
                    <tr>
                        <td><?php echo $ID=$rowt["ID"]; ?></td>
                        <td><?php echo $name=$rowt["name"]; ?></td>
                        <td><?php echo $department=$rowt["department"]; ?></td>
                        <td><?php echo $mobileno=$rowt["mobileno"]; ?></td>
                        <td><?php echo $email=$rowt["email"]; ?></td>
                        <td><center>
                            <form method="POST" action="admineditteacher.php" style="float:left;">
                            <button class="btn btn-success" style="margin-left: 5px;" value="<?php echo $rowt['idt']; ?>" name="idt"><i class="fa fa-edit" style="font-size: 15px;"></i></button> </form>
                           <form method="POST" action="delteacher.php" style="float:right;">
                            <button class="btn btn-danger" style="margin-left: 5px;" value="<?php echo $rowt['idt']; ?>" name="idt"><i class="fa fa-trash" style="font-size: 15px;"></i></button></form>
                        </center>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
        </div>


        <div class="tab-pane" role="tabpanel" id="tab-3" >
          <div class="login-clean">
            <form class="shadow" method="post" style="max-width: 480px;">

            <h3 class="text-uppercase text-center justify-content-center" style="color: black; ">Assign Subjects</h3><br>
             <input type="hidden" name="teaid" value="<?php echo $row['teacherid']; ?>" />      
           
             <div class="form-group">
                <select class="form-control" name="tID" id="tID" style="color: rgb(0,0,0);">
                <option value="">ID</option>
             <?php 
             $sqlid = "SELECT * FROM adminteacher order by ID asc";
             $resultid = mysqli_query($conn,$sqlid); 
               
            while ($row3 = mysqli_fetch_array($resultid)) {
            echo "<option value='" . $row3['idt'] . "'>".$row3['ID']." - ".$row3['name']. "</option>";} 
             ?>
            </select></div>
            <div class="form-group">
            <select class="form-control" name="department1" id="department1" style="color: black">
            <option>Department</option>  
            <option value="COMPUTER">COMPUTER</option>
            <option value="INFORMATION TECHNOLOGY">INFORMATION TECHNOLOGY</option>
            <option value="ELECTRONICS & TELECOMMUNICATION">ELECTRONICS & TELECOMMUNICATION</option>
            <option value="ELECTRONICS">ELECTRONICS</option>
            <option value="INSTRUMENTATION">INSTRUMENTATION</option>
            </select></div>
           
          <div class="form-group">
         <select class="form-control" name="semestersub" id="semestersub" style="color: rgb(0,0,0);">
              
            <option value='' selected>Semester</option>
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
        
        <div class="form-group">
        <select class="form-control" size="1" name="selsub" id="selsub" style="color: rgb(0,0,0);">
        <option selected>Subject</option></select></div>

<div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: #6665b1;" name="savesubt">Save</button></div>
        </form>

        <?php
                if(isset( $_POST["savesubt"])){
                
                     $teacherid=$_POST["tID"];
                     $department1=$_POST["department1"];
                     $semestersub=$_POST["semestersub"];
                     $selsub=$_POST["selsub"];

                    $sel_sub="select subject from adminsubjects where subject='$selsub';";
                    $run_sub=mysqli_query($conn,$sel_sub);
                    $row_sub=mysqli_num_rows($run_sub);
                        
                        if($row_sub >0){
                        echo "<script>alert(' Subject is already assigned! Choose another subject.');</script>";
                        echo "<script>window.location.href='./adminteacher.php';</script>";  
                        }
                    else{
              
            $querysu="insert into adminsubjects values(' ','$teacherid','$department1','$semestersub','$selsub');";
                   
                    $runsu=mysqli_query($conn,$querysu);
                    if(isset($runsu)){
                        echo "<script>alert('Successful!');</script>";
                        echo "<script>window.location.href='./adminteacher.php';</script>";  
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
                        <th id="trs-hd">ID</th>
                        <th id="trs-hd">Name</th>
                        <th id="trs-hd">Department</th>
                        <th id="trs-hd">Semester</th>
                        <th id="trs-hd">Subject</th>
                        <th id="trs-hd" style="width: 140px">Action</th>
                       </tr>
                </thead>
                <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>

            <?php 
            /*$select11="select * FROM adminsubjects AS asubj INNER JOIN adminteacher AS ateac ON ateac.idt = asubj.teacherid order by semid asc";*/
           
            //$select12= "INSERT INTO subteastu select ' ', atec.ID,atec.name,asubj.department,aseme.semester,asubj.subject FROM adminsemester aseme, adminsubjects asubj, adminteacher atec where aseme.id = asubj.semid and atec.idt=asubj.teacherid order by semid asc";
            $select12="select atec.ID,asubj.subid,asubj.teacherid,atec.name,asubj.department,aseme.semester,asubj.subject FROM adminsemester aseme, adminsubjects asubj, adminteacher atec where aseme.id = asubj.semid and atec.idt=asubj.teacherid order by semid asc";
            //endforeach;
            $run_s11=mysqli_query($conn,$select12);
           
            while ($row11=mysqli_fetch_array($run_s11)){
            ?>
                    <tr>
                        <td><?php echo $ID=$row11["ID"]; ?></td>
                        <td><?php echo $name=$row11["name"]; ?></td>
                        <td><?php echo $department=$row11["department"]; ?></td>
                        <td><?php echo $semester=$row11["semester"]; ?></td>
                        <td><?php echo $subject=$row11["subject"]; ?></td>
                        <td><center>
                            <form method="POST" action="admineditteasub.php" style="float:left;">
                            <button class="btn btn-success" style="margin-left: 5px;" value="<?php echo $row11['ID']; ?>" name="idts"><i class="fa fa-edit" style="font-size: 15px;"></i></button> </form>
                           <form method="POST" action="deltsub.php" style="float:right;">
                            <button class="btn btn-danger" style="margin-left: 5px;" value="<?php echo $row11['subid']; ?>" name="idts"><i class="fa fa-trash" style="font-size: 15px;"></i></button></form>
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
