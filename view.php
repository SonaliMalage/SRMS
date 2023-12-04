<?php
        session_start();
        $name = "";
        $conn = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($conn,"sturms");
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
<body style="background-image: url('assets/img/bgn.jpg');background-size: cover;">

<div>

<div class="icon-bar">
           <a class="btn btn-primary btn-block" style="background-color: #6665b1;width:120px;margin-top: 8px; margin-left: 10px;border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);" href="Teacherdashboard.php"> &nbsp;<b>Dashboard</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
  
<div style="float:right; margin-top: -38px;float: right;margin-right: 20px;"><a class="btn btn-primary" style="background-color: #6665b1;border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); " href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></a></div>
            
    <center> 
        <div class="login-clean" style="max-width: 450px"> 
           <h2>Message</h2>
          
             <hr>
               <form class="shadow">
 
        <h3>  <div class="form-group"> <i style="font-size:20px;">Student name:</div></i><hr>
          <div class="form-group"> <i style="font-size:20px; float: center;">Roll no</div></i><hr>
           <div class="form-group"> <i style="font-size:20px;">Deparment</div></i><hr>
         
              <div class="form-group"> <i style="font-size:20px;">Subject</div></i><hr> </h3>
          <div class="form-group"><textarea class="form-control" type="text"  placeholder="Reply"></textarea></div>
 <div class="form-group"><button class="btn btn-primary " style="background-color: #6665b1;">Send</button></div>
      
   </form>
<?php
                //if(isset( $_POST["SUBMIT"]))
                if($_SERVER["REQUEST_METHOD"] == "POST"){

                    $receiver=mysqli_real_escape_string($conn, $_POST["ID"]);
                    //$sender= $row['rollno'] ;
                    $DATE=date("Y/m/d");
                    $rollno=mysqli_real_escape_string($conn, $_POST["rollno"]);
                    $subject=mysqli_real_escape_string($conn, $_POST["subject"]);
                    $message=mysqli_real_escape_string($conn, $_POST["message"]);


                    $query="INSERT INTO `received_messages`(`receiver`, `sender`, `date`, `subject`, `message`) VALUES ('$receiver','$sender','$DATE','$subject','$message');";
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
   </center>
     </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>