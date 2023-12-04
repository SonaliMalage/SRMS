
<?php 
	$conn=mysqli_connect("localhost","root","","sturms") or die("connection not established");

	if(isset($_POST['idt'])){
		
		mysqli_query($conn,"delete from adminteacher where idt='".$_POST['idt']."'");
		echo "<script>alert('Deleted!');</script>";
		echo "<script>window.location.href='./adminteacher.php';</script>";	
				//header('location:issue.php');
	}
	else{
		?>
		<script>
			window.alert('Error! Cannot be deleted.');
			window.location.href='adminteacher.php';
		</script>
		<?php
	}
	
?> 
