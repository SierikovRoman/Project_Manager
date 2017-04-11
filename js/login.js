function er() {
    var mail = document.querySelectorAll('[name="email"]')[0].value;
    var pass = document.querySelectorAll('[name="password"]')[0].value;
    console.log("Success!" + "\n" + "mail :" + mail + "\n" + "password :" + pass);

}

jQuery(document).ready(function($) {
	$('#login-form').submit(function(event) {
		var form = $(this).serialize();
		$.ajax({
			url: 'login.php',
			type: 'POST',
			dataType: 'html',
			data: form,
			success: function(data){
				if (data=='admin')//если админ
				{ 
					document.location.href="Administrator.php";
				}else if(data=='pm'){
					document.location.href="ProjectManager.php";
				}else if(data=='employee'){
					document.location.href="Employee.php";
				}else{
					document.location.href="Error.html";
				}
			}
		})		
	});
});









