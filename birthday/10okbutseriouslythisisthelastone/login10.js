$(document).ready(function(){
	$('.signin').click(function(e){
		
		var pw = $('.pw');
		
		e.preventDefault();
		
		$.ajax({
			url: "/10okbutseriouslythisisthelastone/login10.php",
			type: "POST",
			data: {"pw" : pw.val() }
		}).done(function(ret){
			window.location = ret;			
		})	
	});
});
