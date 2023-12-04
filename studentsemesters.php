 <?php
 session_start();
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: studentlogin.php");
    exit;
}
//echo $_SESSION['rollno'];
 include("adcon.php");

 $result1 = mysqli_query($conn,"select astu.rollno,stusemptr.stdptr, astu.name, stusemptr.department,asem.semester,stusemptr.pointer from adminstudentptr stusemptr, adminstudent astu, adminsemester asem where stusemptr.rollno=astu.ids and stusemptr.semester=asem.id and astu.email='".$_SESSION['email']."'");
        $row = mysqli_fetch_assoc($result1);
        
$res_message = mysqli_query($conn, "SELECT * FROM received_messages WHERE receiver = '".$row['rollno']." - ".$row['name']."' AND notificationStatus = 0;");//1=Read & 0=NotRead
    $unread_count = mysqli_num_rows($res_message);
 
        
        ?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentModule</title>
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
.enabled-link {
color:blue;
text-decoration:underline;
}

.disabled-link{
color:grey;
text-decoration:underline;
}
.text {
  
    font-family: verdana;
   
    
}</style>
</head>

<body style="background-image: url('assets/img/bgn.jpg');background-size: cover;">
 <div style="float:right; margin-top: 14px;float: right;margin-right: 20px;"><a class="btn btn-primary" style="background-color: #6665b1; border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);" href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></a></div>
      

    <div>   
         <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
            <a class="btn btn-primary btn-block" style="border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);background-color: #6665b1;width:120px;margin-top: 5px; margin-left: 10px;" href="studentsemesters.php"> &nbsp;<b>Dashboard</b></a>
        
            <div class="container">
                     <a class="navbar-brand"><strong><?php echo $row['name']; ?></strong></a>
                <button style="background-color: white;" class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                    <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navcol-1">
                     <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation" data-bs-hover-animate="pulse"><a class="nav-link" href="studentmessages.php"><strong>Contact Faculty</strong></a></li>
                    </ul>  <div class="collapse navbar-collapse" id="navcol-1">
               
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation" data-bs-hover-animate="pulse"><a class="nav-link" href="receivedMsg.php"><i class="fa fa-envelope fa-2x"></i></a></li>
                         <li id="notifications_counter"><?php if($unread_count != '0'){
                         echo $unread_count; 
                     }?></li>
                   
                    </ul></div>
              
                </div>

            </div>
        </nav>
 </div>
       <div class="features-boxed" >
        <div class="container">
            <div class="intro" style="margin-top:-30px;">
                <h2 class="text-uppercase text-center justify-content-center " style="color: black"><b class="text">Semesters</b></h2>
            </div>
            <div class="row align-content-center m-auto features" style="width:800px;">
                <div class="col-sm-6 col-md-5 col-lg-4 item" data-bs-hover-animate="pulse">
                    <div class="box "  style="border-radius: 10px;  box-shadow: 0px 18px 25px rgba(0, 0, 0, 0.6);">  
                       <h3 class="name"><a href="studentResult.php?s1=SEM I"><b>Semester I</b></a></h3>
                        <?php
                        $result11 = mysqli_query($conn,"select stusemptr.pointer from adminstudentptr stusemptr, adminstudent astu, adminsemester asem where stusemptr.rollno=astu.ids and astu.email='".$_SESSION['email']."' and stusemptr.semester='1'");
                     $row1 = mysqli_fetch_assoc($result11);                              
                     ?>   <p class="description"><?php if(isset($row1)) {
                            echo "<h4>".$row1['pointer']."</h4>";
                            }
                            else{
                                echo "Not Completed!";
                            }  ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item" data-bs-hover-animate="pulse">
                    <div class="box "  style="border-radius: 10px;  box-shadow: 0px 18px 25px rgba(0, 0, 0, 0.6);">
                         <h3 class="name"><a href="studentResult.php?s1=SEM II"><b>Semester II</b></a></h3>
                        <?php
                        $result11 = mysqli_query($conn,"select stusemptr.pointer from adminstudentptr stusemptr, adminstudent astu, adminsemester asem where stusemptr.rollno=astu.ids and astu.email='".$_SESSION['email']."' and stusemptr.semester='2'");
                     $row2 = mysqli_fetch_assoc($result11);
                     ?>
                   
                       
                        <p class="description"><?php if(isset($row2)) {
                            echo "<h4>".$row2['pointer']."</h4>";
                            }
                            else{
                                echo "Not Completed!";
                            }  ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item" data-bs-hover-animate="pulse">
                    <div class="box" style="border-radius: 10px;  box-shadow: 0px 18px 25px rgba(0, 0, 0, 0.6);">
                          <h3 class="name"><a href="studentResult.php?s1=SEM III"><b>Semester III</b></a></h3>
                        <?php
                        $result11 = mysqli_query($conn,"select stusemptr.pointer from adminstudentptr stusemptr, adminstudent astu, adminsemester asem where stusemptr.rollno=astu.ids and astu.email='".$_SESSION['email']."' and stusemptr.semester='3'");
                     $row3 = mysqli_fetch_assoc($result11);
                     ?>
                   
                        <p class="description"><?php if(isset($row3)) {
                            echo "<h4>".$row3['pointer']."</h4>";
                            }
                            else{
                                echo "Not Completed!";
                            }  ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item" data-bs-hover-animate="pulse">
                    <div class="box "  style="border-radius: 10px;  box-shadow: 0px 18px 25px rgba(0, 0, 0, 0.6);">
                     <h3 class="name"><a href="studentResult.php?s1=SEM IV"><b>Semester IV</b></a></h3>
                        <?php
                        $result11 = mysqli_query($conn,"select stusemptr.pointer from adminstudentptr stusemptr, adminstudent astu, adminsemester asem where stusemptr.rollno=astu.ids and astu.email='".$_SESSION['email']."' and stusemptr.semester='4'");
                     $row4 = mysqli_fetch_assoc($result11);
                     ?>
                    
                        <p class="description"><?php if(isset($row4)) {
                            echo "<h4>".$row4['pointer']."</h4>";
                            }
                            else{
                                echo "Not Completed!";
                            }  ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item" data-bs-hover-animate="pulse">
                    <div class="box "  style="border-radius: 10px;  box-shadow: 0px 18px 25px rgba(0, 0, 0, 0.6);">
                        <h3 class="name"><a href="studentResult.php?s1=SEM V"><b>Semester V</b></a></h3>
                        <?php
                        $result11 = mysqli_query($conn,"select stusemptr.pointer from adminstudentptr stusemptr, adminstudent astu, adminsemester asem where stusemptr.rollno=astu.ids and astu.email='".$_SESSION['email']."' and stusemptr.semester='5'");
                     $row5 = mysqli_fetch_assoc($result11);
                     ?>
                   
                        <p class="description"><?php if(isset($row5)) {
                            echo "<h4>".$row5['pointer']."</h4>";
                            }
                            else{
                                echo "Not Completed!";
                            }  ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item" data-bs-hover-animate="pulse">
                    <div class="box " style="border-radius: 10px;  box-shadow: 0px 18px 25px rgba(0, 0, 0, 0.6);">
                        <h3 class="name"><a href="studentResult.php?s1=SEM VI"><b>Semester VI</b></a></h3>
                        <?php
                        $result11 = mysqli_query($conn,"select stusemptr.pointer from adminstudentptr stusemptr, adminstudent astu, adminsemester asem where stusemptr.rollno=astu.ids and astu.email='".$_SESSION['email']."' and stusemptr.semester='6'");
                     $row6 = mysqli_fetch_assoc($result11);
                     ?>
                        <p class="description"><?php if(isset($row6)) {
                            echo "<h4>".$row6['pointer']."</h4>";
                            }
                            else{
                                echo "Not Completed!";
                            }  ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item" data-bs-hover-animate="pulse">
                    <div class="box "  style="border-radius: 10px;  box-shadow: 0px 18px 25px rgba(0, 0, 0, 0.6);">
                        <h3 class="name"><a href="studentResult.php?s1=SEM VII"><b>Semester VII</b></a></h3>
                        <?php
                        $result11 = mysqli_query($conn,"select stusemptr.pointer from adminstudentptr stusemptr, adminstudent astu, adminsemester asem where stusemptr.rollno=astu.ids and astu.email='".$_SESSION['email']."' and stusemptr.semester='7'");
                     $row7 = mysqli_fetch_assoc($result11);
                     ?>
                        <p class="description"><?php if(isset($row7)) {
                            echo "<h4>".$row7['pointer']."</h4>";
                            }
                            else{
                                echo "Not Completed!";
                            } ?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item" data-bs-hover-animate="pulse">
                    <div class="box"  style="border-radius: 10px;  box-shadow: 0px 18px 25px rgba(0, 0, 0, 0.6);">
                        <h3 class="name"><a href="studentResult.php?s1=SEM VIII"><b>Semester VIII</b></a></h3>
                        <?php
                        $result11 = mysqli_query($conn,"select stusemptr.pointer from adminstudentptr stusemptr, adminstudent astu, adminsemester asem where stusemptr.rollno=astu.ids and astu.email='".$_SESSION['email']."' and stusemptr.semester='8'");
                     $row8 = mysqli_fetch_assoc($result11);
                     ?>
                        <p class="description"><?php if(isset($row8)) {
                            echo "<h4>".$row8['pointer']."</h4>";
                            }
                            else{
                                echo "Not Completed!";
                            }  ?></p>
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