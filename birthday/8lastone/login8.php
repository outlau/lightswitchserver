<?php
$username = "01100001 01100100 01101101 01101001 01101110";
$password = "1100000101110111100";
$nextURL = "/9jk/9jk.html";
	
	$un = $_POST["un"];
	$pw = $_POST["pw"];
	
	if($un == $username && $pw == $password){
		echo $nextURL;
	}
	else {
		echo "/8lastone/8lastone.html";				
	}
?>
