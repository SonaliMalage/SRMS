<?php 
	include("adcon.php");

	if(isset($_POST['idr'])){
		
		mysqli_query($conn,"delete from marks where idm='".$_POST['idr']."'");
		echo "<script>alert('Deleted!');</script>";
		echo "<script>window.location.href='./add_marks.php';</script>";	
				//header('location:issue.php');
	}
	else{
		?>
		<script>
			window.alert('Error! Cannot be deleted.');
			window.location.href='add_marks.php';
		</script>
		<?php
	}
	
?> 

<?php
/*
include "adcon.php"; // Using database connection file here
//$conn=mysqli_connect("localhost","root","","sturms") or die("connection not established");

$idptr = $_GET['idsmptr']; // get id through query string

$delptr = mysqli_query($conn,"delete from adminstudentptr where stdptr = '$idptr'"); // delete query

if($delptr)
{
	mysqli_close($conn);
	echo "<script>alert('Deleted');</script>";
    echo "<script>window.location.href='./adminstudent.php';</script>";	
	 // redirects to all records page	
    exit;
}
else
{
    echo "<script>alert('Error deleting record');</script>"; // display error message if not delete
    echo "<script>window.location.href='./adminstudent.php';</script>";	
	}*/
?>