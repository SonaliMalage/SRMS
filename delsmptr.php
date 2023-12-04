<?php

include "adcon.php"; // Using database connection file here
//$conn=mysqli_connect("localhost","root","","sturms") or die("connection not established");

$idptr = $_POST['idsmptr']; // get id through query string

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
	}
?>
