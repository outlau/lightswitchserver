$(document).ready(function(){
	$('.signin').click(function(e){
		
		var un = $('.un');
		var pw = $('.pw');		
		e.preventDefault();
		
		$.ajax({
			url: "/6thisoneisreallyfun/login6.php",
			type: "POST",
			data: { "un" : un.val(), "pw" : pw.val() }
		}).done(function(ret){
				window.location = ret;
		})
		
	});
	
});
