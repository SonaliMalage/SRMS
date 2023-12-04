<?php
 session_start();
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: teacherindex.php");
    exit;
}
 include("adcon.php");
//echo $_SESSION['department'];
//echo $_SESSION['name'];
//echo $_SESSION['ID'];
//echo $_SESSION['ID']." - ".$_SESSION['name'];

     $result1 = mysqli_query($conn,"select atec.name,atec.ID from adminteacher atec, adminstudent astu, adminsemester asem where atec.email='".$_SESSION['email']."'");
        $row = mysqli_fetch_assoc($result1);

  $res_message = mysqli_query($conn, "select receiver, notificationStatus from received_messages  WHERE receiver = '".$row['ID']." - ".$row['name']."' AND notificationStatus = 0");//1=Read & 0=NotRead
           $unread_count = mysqli_num_rows($res_message);     

?>


<!DOCTYPE html>
<html style="color: rgb(255,255,255);">

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
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
   <link rel="stylesheet" href="assets/css/maincss.css">
</head>

<body style="background-image: url('assets/img/bgn.jpg');background-size: cover;">
  <div style="margin-top: 36px">   
         <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
            
             <div class="container">
                <a class="navbar-brand" style="color: white"><strong><?php echo $row['name']; ?></strong></a>
                <button style="background-color: white;" class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1">
                    <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navcol-1" >
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="terecmsg.php"><i class="fa fa-envelope fa-2x"></i></a></li>
                         <li id="notifications_counter" style="color: #ffffff"><?php if($unread_count != '0'){
                         echo $unread_count; 
                     }?></li>
                    </ul>
                 <span class="navbar-text actions"> 
                       <div style="float:right; margin-top: 10px;float: right;margin-right: -80px;"><a class="btn btn-primary" style="border-radius: 5px; border: none; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);background-color: #6665b1; color: white; " href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></a></div>
                    </span>
                </div>

            </div>
        </nav>
 </div>

    <div style="margin-top: -58px">
       <h1 class="text-uppercase text-center justify-content-center" style="font-weight:bold;font-family:Alegreya, serif;background-color:#d96ed1;color:white;">Dashboard</h1>
     </div>
   </div>
        <div class="container">
              <br><br><br>
            <div class="row">

                <div class="col-md-4">
                     <div class="login-clean">
                        <form  style="box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.4);"><center>
                            <i class="fas fa-user-friends" style="font-size: 100px;"></i><br><br>
                            <a class="btn btn-primary btn-lg" role="button" data-bs-hover-animate="pulse"  href="add_marks.php">Student</a></center></form></div></div>

                <div class="col-md-4"><div class="login-clean">
                        <form  style="box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.4);"><center> <i class="far fa-list-alt" style="font-size: 100px;"></i><br><br> <a class="btn btn-primary btn-lg" role="button" data-bs-hover-animate="pulse" href="report.php">Report</a></center></form></div></div>

                <div class="col-md-4"><div class="login-clean">
                        <form  style="box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.4);"><center>
                    <i class="fas fa-comment-dots" style="font-size: 100px;"></i><br><br><a class="btn btn-primary btn-lg" role="button" data-bs-hover-animate="pulse" href="Message.php"> Message</a></center></form></div></div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>