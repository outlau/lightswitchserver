$(document).ready(function(){
	$('.signin').click(function(e){
		
		var money = $('.money');
		
		e.preventDefault();
		
		$.ajax({
			url: "/11lololol/login11.php",
			type: "POST",
			data: { "money" : money.val() }
		}).done(function(ret){
			console.log(ret);
		})
		/*
		$('#formlogin .alert-danger').fadeIn('slow', function(){
					setTimeout("$('#formlogin .alert-danger').fadeOut('slow')", 3000);			
				});
		*/
	});
	
});
