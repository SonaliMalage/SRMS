$(document).ready(function() {
	$("#semester").change(function() {
		var id = $(this).val();
		if(id != " ") {
			$.ajax({
				url:"selc.php",
				data:{id},
				type:'POST',
				success:function(response) {
					var resp = $.trim(response);
					$("#subjects").html(resp);
				}
			});
		} else {
			$("#subjects").html("<option value=''>------- Select --------</option>");
		}
	});
});
