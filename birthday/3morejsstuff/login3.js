$(document).ready(function(){
	$('.signin').click(function(e){
		
		var un = $('.un');
		var pw = $('.pw');	
		
		e.preventDefault();
		
		$.ajax({
			url: "/3morejsstuff/login3.php",
			type: "POST",
			data: { "un" : un.val(), "pw" : pw.val() }
		}).done(function(ret){
			if(ret == 0){
				$('#formlogin .alert-danger').fadeIn('slow', function(){
					setTimeout("$('#formlogin .alert-danger').fadeOut('slow')", 3000);			
				});
			}
			else if(ret == 1){
				window.location = "/4nextone/4nextone.html";
			}	
		})
		
	});
	
});
