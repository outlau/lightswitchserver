$(document).ready(function(){
	$('.signin').click(function(e){
		
		var un = $('.un');
		var pwIsTrue = $('.pw');
		
		e.preventDefault();
		
		$.ajax({
			url: "/9jk/login9.php",
			type: "POST",
			data: { "un" : un.val(), "pw" : pwIsTrue }
		}).done(function(ret){
			window.location = ret;
		})
		
	});
	
});
