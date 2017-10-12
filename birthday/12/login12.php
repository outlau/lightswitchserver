<?php
session_start();		
 define('DBHOST', 'localhost');
 define('DBUSER', 'root');
 define('DBPASS', 'tupac21');
 define('DBNAME', 'myDB');
 
 $conn = mysql_connect(DBHOST,DBUSER,DBPASS);
 $db = mysql_select_db(DBNAME);
		
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	
	$un = $_POST["un"];
	$pw = $_POST["pw"];
	$res = mysql_query("SELECT * FROM birthday WHERE un = $un and pw = $pw");
	$row = mysql_fetch_array($res);
	$count = mysql_num_rows($res);
	
	if($count == 1){// && $row['password'] == $password){
		echo "/11lololol/11lololol.html";
	}
	else {
		echo "/12/12hackerxtreme.html";				
	}
?>
