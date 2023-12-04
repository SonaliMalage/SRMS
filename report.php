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
    <script src="jquery.js"></script>
<style type="text/css">

.hide-on-screen {display:none;}

@media print
{     
  .hide-on-screen 
  {
    display:block;
}

    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>
</head>

<body style="background-image: url('assets/img/bgn.jpg');background-size: cover;" ><div class="no-print">
<div class="icon-bar">
  <a class="btn btn-primary btn-block" style="border-radius: 5px; border: none;box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); background-color: #6665b1;width:120px;margin-top: 8px; margin-left: 10px;" href="Teacherdashboard.php"> &nbsp;<b>Dashboard</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
  
<div style="float:right; margin-top: -38px;float: right;margin-right: 20px;"><a class="btn btn-primary" style="border-radius: 5px; border: none; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);  background-color: #6665b1; " href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></a></div>
   
</div></div>

 <center>            
    <h1 class="text-uppercase text-center justify-content-center " style="color: black"><b class="text">Report</b></h1>  
     
        <div class="col-md-12 search-table-col" style="margin-top: 20px">
     <div class="no-print">
        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div></div>
        <div class="table-responsive table-bordered table table-hover table-bordered results">
            <table id="mytable" class="table table-bordered table-hover"  style="background-color: white">
                   <thead class="bill-header cs ">
                      <tr>
               
                        <th id="trs-hd" >Roll No</th>                   
                        <th id="trs-hd" >Department</th>
                        <th id="trs-hd">Semester</th>             
                        <th id="trs-hd" >Subject</th>
                        <th id="trs-hd" >IA-1</th>
                        <th id="trs-hd" >IA-2</th>
           </tr>
          </thead>
                
                <tbody>
      <?php                     
                    $query="select m.rollno,m.dept,m.sub,m.m1,m.m2,s.semester from adminteacher ate, marks m, adminsemester s, adminsubjects adsb where s.id=m.Semester and m.sub= adsb.subject and adsb.teacherid=ate.idt and m.dept='".$_SESSION['department']."' and email= '".$_SESSION['email']."'"; 
                     $result=mysqli_query($conn,$query); 
                   while($rows=mysqli_fetch_assoc($result)) 
                    { 
                    ?> 

                    <tr>
                        <td><?php echo $rows['rollno']; ?></td>
                        <td><?php echo $rows['dept']; ?></td>
                        <td><?php echo $rows['semester']; ?></td>                       
                        <td><?php echo $rows['sub']; ?></td>
                        <td><?php echo $rows['m1']; ?></td>
                        <td><?php echo $rows['m2']; ?></td>

                    </tr>
                     <?php 
                     }
                ?>

                </tbody>
            </table>
      
         </div>
     </div>  
 <div class="no-print">
            <div class="tab-content"><center>
             <button class="btn btn-primary" onclick="window.print()" style="border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);  background-color: #6665b1;"><span class="fa fa-print" aria-hidden="true"></span>&nbsp;&nbsp;<b>Print</b></button>
        </center></div></div>
</center></div>
    
 <script src="ddtf.js"></script>
    <script>
        $('#mytable').ddTableFilter();
    </script>
     <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>