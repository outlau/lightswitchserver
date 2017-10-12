<?php
	$username = "admin";
	$password = "pussy69";
	$nextURL = "/8lastone/8lastone.html";
	
	$un = $_POST["un"];
	$pw = $_POST["pw"];
	
	if($un == $username && $pw == $password){// && $row['password'] == $password){
		echo $nextURL;
	}
	else {
		echo "/7happybirthday/7happybirthday.html";				
	}
?>
