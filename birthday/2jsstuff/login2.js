$(document).ready(function(){
	$('.signin').click(function(e){
		
		var un = $('.un');
		var pw = $('.pw');
		
		var correctUn = "coolguy";
		var correctPw = "6969";
		e.preventDefault();
		
		if (un.val() == correctUn && pw.val() == correctPw) {
		
			$.ajax({
				url: "/2jsstuff/login2.php",
				type: "POST",
			}).done(function(ret){
				
					window.location = ret;
			})
		}
		else{
			$('#formlogin .alert-danger').fadeIn('slow', function(){
					setTimeout("$('#formlogin .alert-danger').fadeOut('slow')", 3000);			
				});		
		}
	});
});
