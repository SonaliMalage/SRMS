 <?php
 session_start();
 //echo $_GET['s1'];
 //echo $_SESSION['loggedin'];
 //error_reporting(E_ALL ^ E_NOTICE); 
 //error_reporting(E_ERROR | E_PARSE);

 set_error_handler("customError",E_ALL);
function customError()
  {
  echo " <center><h3 style='color: #000000;align-self: ''>No Result...</h3></center> ";
  //echo "Ending Script";
  die();
  }

  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: studentlogin.php");
    exit;
}
 include("adcon.php");
 $result1 = mysqli_query($conn,"select * from adminstudentptr stusemptr, adminstudent astu, adminsemester asem, adminsubjects asub where stusemptr.rollno=astu.ids and stusemptr.semester=asem.id and asub.semid=stusemptr.semester and astu.email='".$_SESSION['email']."'");
        $row = mysqli_fetch_assoc($result1);      
        ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>studentModule</title>
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
   <link rel="stylesheet" href="assets/css/maincss.css">
   <link rel="stylesheet" href="assets/css/Features-Boxed.css">
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

<body style="background-image: url('assets/img/bgn.jpg');background-size: cover;">
    
      <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
              <a class="btn btn-primary btn-block" style="border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);background-color: #6665b1;width:120px;margin-top: 5px; margin-left: 10px;" href="studentsemesters.php"> &nbsp;<b>Dashboard</b></a>
        
            <div class="container">
                <a class="navbar-brand" ><strong><?php echo $row['name']; ?></strong></a>
               <button style="background-color: white;" class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                    <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navcol-1">

                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="studentmessages.php"><strong>Contact Faculty</strong></a></li>
                    </ul>

                     <span class="navbar-text actions "> 
                       <div style="float:right; margin-top: 14px;float: right;margin-right: -40px;"><a class="btn btn-primary" style="border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);background-color: #6665b1; color: white; " href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></a></div>
                    </span>
                </div>
            </div>
        </nav>
    </div>
    <div class="result-block"><h3 class="text-uppercase text-center justify-content-center " style="color: black"><b>Student Result Details</b></h3><br>
    <br>
        <p style="font-size: 20px"><b >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student Roll No: </b><?php echo $row['rollno']; ?></p><br>
       <br>
       <?php 
       if(!set_error_handler("customError",E_ALL))
       {//error_reporting(0);

    //echo "<center><h3 style='color: #000000;align-self: '>No Result...</h3></center> ";
 
       }else{
       ?>
        <div class="col-md-12 search-table-col" style="margin-top:-50px;"> 
        <div class="no-print">
        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div></div>
        <div class="table-responsive table-bordered table table-hover table-bordered results" >
            <table class="table table-bordered table-hover shadow"  style="background-color: white">
                <thead class="bill-header cs">
                <tr>
                 <th id="trs-hd">Sr. No.</th> 
                 <th id="trs-hd">Subject Name</th>      
                 <th id="trs-hd">IA 1</th>
                 <th id="trs-hd">IA 2</th>
                 <th id="trs-hd">Faculty Name</th>          
            </tr>
             </tr>
                </thead>
                <tbody>
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
            <tr> 
                <?php
                     $result11 = mysqli_query($conn,"select asem.sub1,asem.sub2,asem.sub3, asem.sub4, asem.sub5, asem.sub6 from adminstudentptr stusemptr, adminstudent astu, adminsemester asem, adminsubjects asub where stusemptr.rollno=astu.ids and stusemptr.semester=asem.id and asub.semid=stusemptr.semester and astu.email='".$_SESSION['email']."' and asem.semester='".$_GET['s1']."' ");
                     while($row1 = mysqli_fetch_array($result11)){
                       $allsubs1[] = $row1;
                    }
                    ?>
                <td>1</td> 
                <td><?php foreach ($allsubs1 as $sub) {
                }echo $sub[0];
                 ?></td> 
                 <td><?php $resulti= mysqli_query($conn,"select marks.m1,marks.m2 from adminteacher, adminsubjects, adminsemester, marks where adminsemester.id=marks.semester and adminteacher.idt=adminsubjects.teacherid and adminsubjects.semid=adminsemester.id and adminsemester.semester='".$_GET['s1']."' and adminsubjects.subject=marks.sub and adminsubjects.subject='$sub[0]'"); 
                $rowm2 = mysqli_fetch_array($resulti);?>
              <?php echo $rowm2[0];
                ?></td>
                <td><?php echo $rowm2[1]; ?></td>
                <?php $resultif= mysqli_query($conn,"select adminteacher.name from adminteacher, adminsubjects, adminsemester where adminteacher.idt=adminsubjects.teacherid and adminsubjects.semid=adminsemester.id and adminsemester.semester='".$_GET['s1']."' and adminsubjects.subject='$sub[0]'"); 
                $rowt1 = mysqli_fetch_array($resultif);?>
                <td><?php
               echo $rowt1[0];
                ?></td>  
            </tr>
            <tr> 
                <td>2</td> 
                <td><?php echo $sub[1]; ?></td>
                <?php $resulti1= mysqli_query($conn,"select marks.m1,marks.m2 from adminteacher, adminsubjects, adminsemester, marks where adminsemester.id=marks.semester and adminteacher.idt=adminsubjects.teacherid and adminsubjects.semid=adminsemester.id and adminsemester.semester='".$_GET['s1']."' and adminsubjects.subject=marks.sub and adminsubjects.subject='$sub[1]'"); 
                $rowm3 = mysqli_fetch_array($resulti1);?>
                <td><?php echo $rowm3[0]; ?></td> 
                <td><?php echo $rowm3[1]; ?></td>
                <?php $resultif2= mysqli_query($conn,"select adminteacher.name from adminteacher, adminsubjects, adminsemester where adminteacher.idt=adminsubjects.teacherid and adminsubjects.semid=adminsemester.id and adminsemester.semester='".$_GET['s1']."' and adminsubjects.subject='$sub[1]'"); 
                $rowt2 = mysqli_fetch_array($resultif2);?> 
                <td><?php  echo $rowt2[0]; ?></td>  
            </tr>
            <tr> 
                <td>3</td> 
                <td><?php echo $sub[2]; ?></td>
                <?php $resulti2= mysqli_query($conn,"select marks.m1,marks.m2 from adminteacher, adminsubjects, adminsemester, marks where adminsemester.id=marks.semester and adminteacher.idt=adminsubjects.teacherid and adminsubjects.semid=adminsemester.id and adminsemester.semester='".$_GET['s1']."' and adminsubjects.subject=marks.sub and adminsubjects.subject='$sub[2]'"); 
                $rowm4 = mysqli_fetch_array($resulti2);?>
                <td><?php echo $rowm4[0]; ?></td> 
                <td><?php echo $rowm4[1]; ?></td>
                <?php $resultif3= mysqli_query($conn,"select adminteacher.name from adminteacher, adminsubjects, adminsemester where adminteacher.idt=adminsubjects.teacherid and adminsubjects.semid=adminsemester.id and adminsemester.semester='".$_GET['s1']."' and adminsubjects.subject='$sub[2]'"); 
                $rowt3 = mysqli_fetch_array($resultif3);?>
                <td><?php  echo $rowt3[0]; ?></td>  
            </tr>
            <tr> 
                <td>4</td> 
                <td><?php echo $sub[3]; ?></td>  
                <?php $resulti3= mysqli_query($conn,"select marks.m1,marks.m2 from adminteacher, adminsubjects, adminsemester, marks where adminsemester.id=marks.semester and adminteacher.idt=adminsubjects.teacherid and adminsubjects.semid=adminsemester.id and adminsemester.semester='".$_GET['s1']."' and adminsubjects.subject=marks.sub and adminsubjects.subject='$sub[3]'"); 
                $rowm5 = mysqli_fetch_array($resulti3);?>
                <td><?php echo $rowm5[0]; ?></td> 
                <td><?php echo $rowm5[1]; ?></td>
              
                <?php $resultif4= mysqli_query($conn,"select adminteacher.name from adminteacher, adminsubjects, adminsemester where adminteacher.idt=adminsubjects.teacherid and adminsubjects.semid=adminsemester.id and adminsemester.semester='".$_GET['s1']."' and adminsubjects.subject='$sub[3]'"); 
                $rowt4 = mysqli_fetch_array($resultif4);?>
                <td><?php  echo $rowt4[0]; ?></td>  
            </tr>
            <tr> 
                <td>5</td> 
                <td><?php echo $sub[4]; ?></td>  
                <?php $resulti4= mysqli_query($conn,"select marks.m1,marks.m2 from adminteacher, adminsubjects, adminsemester, marks where adminsemester.id=marks.semester and adminteacher.idt=adminsubjects.teacherid and adminsubjects.semid=adminsemester.id and adminsemester.semester='".$_GET['s1']."' and adminsubjects.subject=marks.sub and adminsubjects.subject='$sub[4]'"); 
                $rowm6 = mysqli_fetch_array($resulti4);?>
                <td><?php echo $rowm6[0]; ?></td> 
                <td><?php echo $rowm6[1]; ?></td>
              
                <?php $resultif5= mysqli_query($conn,"select adminteacher.name from adminteacher, adminsubjects, adminsemester where adminteacher.idt=adminsubjects.teacherid and adminsubjects.semid=adminsemester.id and adminsemester.semester='".$_GET['s1']."' and adminsubjects.subject='$sub[4]'"); 
                $rowt5 = mysqli_fetch_array($resultif5);?>
                <td><?php  echo $rowt5[0]; ?></td>  
            </tr>
             <tr> 
                <td>6</td> 
                <td><?php echo $sub[5]; ?></td>  
                <?php $resulti6= mysqli_query($conn,"select marks.m1,marks.m2 from adminteacher, adminsubjects, adminsemester, marks where adminsemester.id=marks.semester and adminteacher.idt=adminsubjects.teacherid and adminsubjects.semid=adminsemester.id and adminsemester.semester='".$_GET['s1']."' and adminsubjects.subject=marks.sub and adminsubjects.subject='$sub[5]'"); 
                $rowm7 = mysqli_fetch_array($resulti6);?>
                <td><?php echo $rowm7[0]; ?></td> 
                <td><?php echo $rowm7[1]; ?></td>
              
                <?php $resultif6= mysqli_query($conn,"select adminteacher.name from adminteacher, adminsubjects, adminsemester where adminteacher.idt=adminsubjects.teacherid and adminsubjects.semid=adminsemester.id and adminsemester.semester='".$_GET['s1']."' and adminsubjects.subject='$sub[5]'"); 
                $rowt6 = mysqli_fetch_array($resultif6);?> 
                <td><?php  echo $rowt6[0]; ?></td>  
            </tr>
        
        </tbody>
            </table>
        </center>
        </div>
        </div>
       <br><br><br>
        </div>
    <center>
       <div class="no-print">
            <div class="tab-content"><center>
             <button class="btn btn-primary" onclick="window.print()" style="margin-top: -122px ;border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);  background-color: #6665b1;"><span class="fa fa-print" aria-hidden="true"></span>&nbsp;&nbsp;<b>Print</b></button>
        </center></div></div> </center> <?php } ?>
  <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>