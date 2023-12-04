$(document).ready(function() {
	$("#semestersub").change(function() {
		var semester_id = $(this).val();
		if(semester_id != "") {
			$.ajax({
				url:"get-subjects.php",
				data:{s_id:semester_id},
				type:'POST',
				success:function(response) {
					var resp = $.trim(response);
					$("#selsub").html(resp);
				}
			});
		} else {
			$("#selsub").html("<option value=''></option>");
		}
	});
});
