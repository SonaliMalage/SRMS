<?php
session_start();
include "adcon.php";
//$conn=mysqli_connect("localhost","root","","sturms") or die("connection not established");
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
   <div style="float:left; margin-top: -34px;margin-left: 20px;"><a class="btn btn-primary" style="background-color: #6665b1;border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); " href="homepage.php"><i class="fa fa-home" style=" color: white;"></i> &nbsp;<b>Home</b></a></div>
    <div class="login-clean">
        <form class="shadow" method="post" style="max-width: 480px;" action="adminregister.php">
            <h3 class="text-uppercase text-center justify-content-center" style="color: black">Register</h3><br>
            <div class="form-group"><input class="form-control" type="text" name="name" placeholder="Name" required></div>
            <div class="form-group">
              <select class="form-control" name="department" style="color: black">  
            <option>Department</option>
            <option value="COMPUTER">COMPUTER</option>
            <option value="INFORMATION TECHNOLOGY">INFORMATION TECHNOLOGY</option>
            <option value="ELECTRONICS & TELECOMMUNICATION">ELECTRONICS & TELECOMMUNICATION</option>
            <option value="ELECTRONICS">ELECTRONICS</option>
            <option value="INSTRUMENTATION">INSTRUMENTATION</option>
            </select></div>
             <div class="form-group"><input class="form-control" type="text" pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9" placeholder="Mobile No" name="mobileno" required></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" required></div>
    <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></div>
    <div class="form-group"><input class="form-control" type="password" name="repassword" placeholder="Repeat Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></div>
    <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="background-color: #6665b1;" name="signup">Sign Up</button></div><a class="forgot" href="adminlogin.php"><br>You already have an account? Login here.<br></a></form>
    </div>


    <?php
                if(isset( $_POST["signup"])){
                    
                    $name=$_POST["name"];
                     $department=$_POST["department"];
                     $mobileno=$_POST["mobileno"];
                     $email=$_POST["email"];
                     $password=$_POST["password"];
                     $repassword=$_POST["repassword"];
                    // $password=md5(password);
                    // $passwordrepeat=md5(passwordrepeat);
                     $password1=md5($password);
                     $repassword1=md5($repassword);
                     
                     
                      if($repassword!=$password){
                        echo "<script>alert(' Password does not match!');</script>";
                        echo "<script>window.location.href='./adminregister.php';</script>";
                     }
                     else{

                    
                    $sel_u="select * from admindetails;";
                    $run_u=mysqli_query($conn,$sel_u);
                    while($row_u=mysqli_fetch_assoc($run_u)){
                        
                        if($email==$row_u['email']){
                        echo "<script>alert(' Email ID already exist. Choose another Email ID!');</script>";
                        echo "<script>window.location.href='./adminregister.php';</script>";  
                        }
                    }
                        
                    $query="insert into admindetails values ('$name', '$department', '$mobileno', '$email', '$password1','$repassword1');";
                    //echo $query."<br>";
                    $run=mysqli_query($conn,$query);
                    if(isset($run)){
                        echo "<script>alert('Successful');</script>";
                        //echo "<script>window.location.href='./student.php';</script>";    
                        echo "<script>window.location.href='./adminlogin.php';</script>";
                    
                    }   }
                } 
                ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>