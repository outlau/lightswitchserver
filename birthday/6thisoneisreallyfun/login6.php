<?php

$username = "admin";
$password = "happybirthday69";
 $nextURL = "/7happybirthday/7happybirthday.html";
	
	$un = $_POST["un"];
	$pw = $_POST["pw"];
	
	if($un == $username && $pw == $password){
		echo $nextURL;
	}
	else {
		echo "/6thisoneisreallyfun/6thisoneisreallyfun.html";				
	}
?>
