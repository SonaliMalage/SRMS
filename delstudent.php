
<?php 
	$conn=mysqli_connect("localhost","root","","sturms") or die("connection not established");

	if(isset($_POST['ids'])){
		
		mysqli_query($conn,"delete from adminstudent where rollno='".$_POST['ids']."'");
		echo "<script>alert('Deleted!');</script>";
		echo "<script>window.location.href='./adminstudent.php';</script>";	
				//header('location:issue.php');
	}
	else{
		?>
		<script>
			window.alert('Error! Cannot be deleted.');
			window.location.href='adminstudent.php';
		</script>
		<?php
	}
	
?> 
