<?php
 session_start();
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: studentlogin.php");
    exit;
}
 include("adcon.php");

 //$result1 = mysqli_query($conn,"select astu.name, astu.rollno from adminstudent astu where and astu.email='".$_SESSION['email']."'");
        //$row = mysqli_fetch_assoc($result1);
        
        $result2 = mysqli_query($conn, "select * from adminstudent where email='".$_SESSION['email']."'");
		$row2 = mysqli_fetch_assoc($result2);

        
        //change status of all messages to read
         mysqli_query($conn, "UPDATE received_messages SET notificationStatus=1 WHERE receiver = '".$row2['rollno']." - ".$row2['name']."';");

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
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
   <link rel="stylesheet" href="assets/css/maincss.css">
<style type="text/css">
        body{
            background-color: #d6edff;
        }

        .collapsible {
            background-color: #fcfcfc;
            color: black;
            cursor: pointer;
            padding: 18px;
            margin-left: 350px; 
            width: 60%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            border-radius: 5px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
            /*display: table*/
        }
        .active, .collapsible:hover {
            background-color: #CCCCFF;
        }
        .content {
            padding: 0 18px;
            max-height: 0;
            overflow: hidden;
            width: 60%;
            margin-left: 350px;
            transition: max-height 0.2s ease-out;
            background-color: white;
            border: none;
             border-radius: 5px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
          

        }
        .collapsible:after {
            content: '\02795'; /* Unicode character for "plus" sign (+) */
            font-size: 13px;
            color: white;
            float: right;
            margin-left: 5px;

        }

        .active:after {
            content: "\2796"; /* Unicode character for "minus" sign (-) */
        }
        .content:after {
            overflow: wrap;
        }
    </style>

</head>

<body style="background-image: url('assets/img/bgn.jpg');background-size: cover;">
    <div style="float:right; margin-top: 14px;float: right;margin-right: 20px;"><a class="btn btn-primary" style="color: white;background-color: #6665b1;border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2); " href="Logout.php"><i class="fa fa-power-off" style=" color: white;"></i> &nbsp;<b>Logout</b></a></div>  
                      
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
             <a class="btn btn-primary btn-block" style="border-radius: 5px; border: none;  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);background-color: #6665b1;width:120px;margin-top: 5px; margin-left: 10px;" href="studentsemesters.php"> &nbsp;<b>Dashboard</b></a>
        
            <div class="container">
                <a class="navbar-brand"><strong><?php echo $row2['name']; ?></strong></a>
               </div>
            </div>
        </nav>
    </div>
    <br>    
    <div id="messagelist">
        <center><span style="color: gray;align-self: ">When you receive messages they will apear here...</span></center><br>
        <div id="message">
            
            <?php
                $sqlQuery = "SELECT * FROM received_messages WHERE receiver = '".$row2['rollno']." - ".$row2['name']."' ORDER BY date DESC,time DESC";
                $result = mysqli_query($conn, $sqlQuery);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<br>"; 
                        echo "<button class='collapsible' style='font-size: 25px;'>";
                        echo "<b>" . $row["sender"]." : </b>";
                        echo " ".$row["subject"];
                        echo "</button>";

                        echo "<form method='POST' class='content'><br>";
                        echo "<input type='hidden' name='ids' value='".$row['msgid']."' />";      
                        echo "From: " .$row["sender"]."<br>";
                        date_default_timezone_set("Asia/Kolkata");
                        echo "Date: ".$row["date"]."<br>";
                        echo "Time: ".$row["time"]."<br>";
                        echo "Subject: ".$row["subject"]."<br>";
                        echo "Message: ".$row["message"]."<br><br>";
                        echo "<textarea class='form-control' style='width:250px' name='msg' placeholder='Reply' required></textarea>";
                        echo "<br><input type='submit' name='submit' class='btn btn-primary' style='color: white;border-radius: 5px; border: none; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);font-weight:bold;background-color: #6665b1;width:120px;' value='Send'>";
                        echo "<br><br>"."</form>";
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $receiver=mysqli_real_escape_string($conn, $row["sender"]);
                    $sender= $row2['rollno']." - ".$row2['name'];
                    $DATE=date("Y/m/d");
                    $time=date("h:i A");
                    $subject=mysqli_real_escape_string($conn, $row["subject"]);
                    $message=mysqli_real_escape_string($conn, $_POST["msg"]);

                    if($row['msgid']==$_POST['ids'])
                    {
                    $query="INSERT INTO `received_messages`(`receiver`, `sender`, `date`,`time`, `subject`, `message`) VALUES ('$receiver','$sender','$DATE','$time','$subject','$message');";
                    //echo $query."<br>";
                    $run=mysqli_query($conn,$query);
                    if(isset($run)){
                        echo "<script>alert('Successful');</script>";
                        echo "<script>window.location.href='receivedMsg.php';</script>";    
                     } 
                       }
                        }

                    }
                } else {
                echo "<center>No messages...</center>";
                }          
            ?><br><br>
        </div>
    </div>
</body>

<script type="text/javascript">
    var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
</html>