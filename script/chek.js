function checkAvailability(){
	jQuery.ajax({
		
		url: "../models/check_availability.php",
		data:'login='+$("#login").val(),
		type: "POST",
		
		success:function(data){
			
			$("#user-availability-status").html(data);
			
			if (data == "<span class='status-not-available'> Username Not Available.</span>"){
				$("#submitButton").attr("disabled","disabled");
			}
			else if(data == "<span class='status-not-available'> Login can't be empty!</span>"){
				$("#submitButton").attr("disabled","disabled");
			}
			else if(data == "<span class='status-not-available'> Login can't be empty! (alt+255)</span>"){
				$("#submitButton").attr("disabled","disabled");}
			else if(data == "<span class='status-not-available'> Only Latin characters and numbers!</span>"){
			$("#submitButton").attr("disabled","disabled");
			}
			else if ($("#login").val().trim() != ''){
				$("#submitButton").removeAttr("disabled");
			}
		},
		
		error:function (){}
				});
}