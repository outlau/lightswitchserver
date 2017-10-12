$(document).ready(function(){
	$('.signin').click(function(e){
		
		var un = $('.un');
		var pw = $('.pw');
		console.log("test");		
		
		var ok = 0;
		e.preventDefault();
		
		$.ajax({
			url: "/5thisoneisfun/anotherphpfilethatblahblahblahurl.php",
			type: "POST",
			data: { "un" : un.val(), "pw" : pw.val() }
		}).done(function(ret){
			if(ok == 0){
				$('#formlogin .alert-danger').fadeIn('slow', function(){
					setTimeout("$('#formlogin .alert-danger').fadeOut('slow')", 3000);			
				});
			}
			else if(ok == 1){
				window.location = ret;
			}	
		})
		
	});
	
});
