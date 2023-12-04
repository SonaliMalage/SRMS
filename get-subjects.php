<?php include("adcon.php"); ?>
<?php
if(isset($_POST['s_id'])) {
	$sql = "select sub1,sub2,sub3,sub4,sub5,sub6 from `adminsemester` where `id`=".mysqli_real_escape_string($conn, $_POST['s_id']);
	$res = mysqli_query($conn, $sql);
	if(mysqli_num_rows($res) > 0) {

		echo "<option value=''>Subject</option>";

		while($row = mysqli_fetch_row($res)) {
			 //$allsubs1 = $fetch['grpsub'];
           
			$allsubs1[] = array_filter($row);
			
         foreach ($allsubs1 as $alsbs) {

          $length = count($alsbs);
          for($i=0;$i<$length;$i++){
//".$row->id."
			echo "<option value='".$alsbs[$i]."'>".$alsbs[$i]."</option>";
			}
		}
		}
	}
} else {
	header('location: ./');
}
?>
