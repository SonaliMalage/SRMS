<?php
//$message="";
 include("adcon.php");

//session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: Teacherdashboard.php");
  exit;
}

if(count($_POST)>0) {
     $password1=md5($_POST["password"]);
        //$result = mysqli_query($conn,"SELECT * FROM student WHERE RollNo='" . $_POST["RollNo"] . "' and password = '". $_POST["password"]."'");
     $result = mysqli_query($conn,"SELECT * FROM adminteacher WHERE password = '".$password1."'and email= '". $_POST["email"]."';")or die('alert'.$password1);
    //echo "SELECT * FROM student WHERE password = '". md5($_POST["password"])."'and RollNo= '". $_POST["RollNo"]."';";

    $count  = mysqli_num_rows($result);
    if($count==0) {
        //echo "Invalid Email ID or Password!";
        echo "<script>alert('Invalid Email ID or Password! ');</script>";
        
        echo "<script>window.location.href='./teacherindex.php';</script>";
        exit();
        //$message = "Invalid Username or Password!";
    } else {
        session_start(); 
        // Store data in session variables
            $_SESSION["loggedin"] = true;
         
        echo "<script>alert('You are successfully authenticated!');</script>";
        echo "<script>window.location.href='./Teacherdashboard.php';</script>";
                                    
        //$message = "You are successfully authenticated!";
    }
}

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
   <link rel="stylesheet" href="assets/css/maincss.css">
</head>

<body style="background-image: url('assets/img/bgn.jpg');background-size: cover;">
     <div style="float:left; margin-top: -34px;margin-left: 20px;"><a class="btn btn-primary" style="background-color: #6665b1;border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); " href="homepage.php"><i class="fa fa-home" style=" color: white;"></i> &nbsp;<b>Home</b></a></div>
   
    <div class="login-clean">
        <form  action="teacherindex.php" class="shadow" method="post" style="max-width: 365px;">
            <h2 class="text-uppercase text-center justify-content-center " style="color: black">Login</h2>
            <div class="illustration"><i class="fa fa-user-circle" style="color: #d96ed1;"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="email" placeholder="Email ID" required ></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required ></div>
            <div class="form-group"><input type="submit" name="submit" value="Log In" class="btn btn-primary btn-block" style="background-color: #6665b1;"></div><a class="forgot" href="teacherforgotpass.php">Forgot your password?</a>
            </form>
<?php
if(isset( $_POST["submit"])){
$email = $_POST['email'];
$password = $_POST['password']; 
$password1=md5($password);

$queryl="insert into logindetails values ('','$email','$password1');";                  
                    $runl=mysqli_query($conn,$queryl);
                    if(isset($runl)){
                        //session_start(); 
                         $_SESSION['email']=$email;
                        }    

   $query = "select * from adminteacher where email= '$email'";
   //echo $query;
                $query_run = mysqli_query($conn,$query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                    if($row['email'] == $email){
                        if($row['password'] == $password1){
                            //session_start();
                            $_SESSION['ID'] = $row['ID'];
                            $_SESSION['name'] =  $row['name'];
                            $_SESSION['idt'] =  $row['idt'];
                            $_SESSION['department'] = $row['department'];
                            header("Location: Teacherdashboard.php");
                        }
                    }
                }

   }

  ?>
 </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>

 
         