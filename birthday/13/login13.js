$(document).ready(function(){
	$('.signin').click(function(e){
		
		var un = $('.un');
		var pw = $('.pw');
		
		e.preventDefault();
		
		$.ajax({
			url: "/1index/login1.php",
			type: "POST",
			data: { "un" : un.val(), "pw" : pw.val() }
		}).done(function(ret){
			if(ret == 0){
				$('#formlogin .alert-danger').fadeIn('slow', function(){
					setTimeout("$('#formlogin .alert-danger').fadeOut('slow')", 3000);			
				});
			}
			else {
				window.location = ret;
			}	
		})
		
	});
	
});
