
<?php 
	include "adcon.php"; 
	
	if(isset($_POST['idts'])){
		
		mysqli_query($conn,"delete from adminsubjects where subid='".$_POST['idts']."'");
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