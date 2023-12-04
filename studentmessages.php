<?php
 session_start();
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: studentlogin.php");
    exit;
}
 include("adcon.php");
 
 $result1 = mysqli_query($conn,"select  astu.rollno,stusemptr.stdptr, astu.name, stusemptr.department,asem.semester,stusemptr.pointer from adminstudentptr stusemptr, adminstudent astu, adminsemester asem where stusemptr.rollno=astu.ids and stusemptr.semester=asem.id and astu.email='".$_SESSION['email']."'");
        $row = mysqli_fetch_assoc($result1);
   $res_message = mysqli_query($conn, "select receiver, notificationStatus from received_messages  WHERE receiver = '".$row['rollno']." - ".$row['name']."' AND notificationStatus = 0");//1=Read & 0=NotRead
            $unread_count = mysqli_num_rows($res_message);
        
        ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StuResMgtSys</title>
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
    <link rel="stylesheet" href="assets/css/maincss.css">
</head>
<body style="background-image: url('assets/img/bgn.jpg');background-size: cover;">
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
                        <li class="nav-item" role="presentation"><a class="nav-link" href="receivedMsg.php"><i class="fa fa-envelope fa-2x"></i></a></li>
                         <li id="notifications_counter"><?php if($unread_count != '0'){
                         echo $unread_count; 
                     }?></li>
                   
                    </ul>
                 <span class="navbar-text actions"> 
                       <div style="float:right; margin-top: 14px;float: right;margin-right: -40px;"><a class="btn btn-primary" style="border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);background-color: #6665b1; color: white; " href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></a></div>
                    </span>
                </div>

            </div>
        </nav>
 </div>
<div class="login-clean" >
        <form class="shadow" method="post" style="max-width: 450px">
            <h2 class="text-center">Contact To Faculty</h2>
            <br>
            <div class="form-group">
             <select class="form-control" name="teaID" style="color: rgb(0,0,0);">
                <option value="">Faculty</option>
             <?php 
             $sqlid = "SELECT ate.idt, ate.ID,ate.name,adsb.subject from adminteacher ate, adminsemester s, adminstusem adst, adminsubjects adsb where s.id=adsb.semid and adst.sem= adsb.semid and adsb.teacherid=ate.idt and adst.rollno ='".$_SESSION['roll']."'";
             $resultid = mysqli_query($conn,$sqlid); 
               
            while ($row3 = mysqli_fetch_array($resultid)) {
            echo "<option value='" . $row3['ID']." - ".$row3['name'] . "'>" . $row3['name'] ." (". $row3['subject'].")"."</option>";
        } 
             ?>
            </select></div>
            <div class="form-group"><input class="form-control" type="text" name="subject" placeholder="Subject" required></div>
            <div class="form-group"><textarea class="form-control" rows="14" name="message" placeholder="Message" required></textarea></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color:rgb(67,55,145);">Send </button></div>
        </form>

<?php
                //if(isset( $_POST["SUBMIT"]))
                if($_SERVER["REQUEST_METHOD"] == "POST"){

                    $receiver=mysqli_real_escape_string($conn, $_POST["teaID"]);
                    $sender= $_SESSION['rollno']." - ".$_SESSION['name'];
                    date_default_timezone_set("Asia/Kolkata");
                    $DATE=date("Y/m/d");
                    $time=date("h:i A");
                    $subject=mysqli_real_escape_string($conn, $_POST["subject"]);
                    $message=mysqli_real_escape_string($conn, $_POST["message"]);

                    $query="INSERT INTO `received_messages`(`receiver`, `sender`, `date`,`time`, `subject`, `message`) VALUES ('$receiver','$sender','$DATE','$time','$subject','$message');";
                    //echo $query."<br>";
                    $run=mysqli_query($conn,$query);
                    if(isset($run)){
                        echo "<script>alert('successful');
                        </script>";
                        echo "<script>window.location.href='studentmessages.php';</script>";    
                     }
                }

?>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>