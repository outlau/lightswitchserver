<?php
	define('DBHOST', 'localhost');
	define('DBUSER', 'admin');
	define('DBPASS', 'tupac21');
	define('DBNAME', 'myDB');
	
	$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
	$db = mysql_select_db(DBNAME);
		
	$lightstate;
	
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . $conn->connect_error);
	    echo "Connection failed";
	}
	$destination = 'sudo -u root python /var/www/html/lights/';
	$getURL = $_GET['request'];
	
	list($file, $ID) = explode("/",$getURL);
	
	
	if($file == "refresh"){
		
		if ($res = mysql_query("SELECT * FROM lights")){
			
			while($row =mysql_fetch_array($res)){
	
				echo $row["id"] ."/" .$row["state"] . "/";
				//echo "bruhhhhh";
			}
		}
	}
	
	else {
		
		echo $file . "  " . $ID;
		$tempstate;
		
		if($file == "turnOn") {	
			$tempstate = 1;
		}
		else{
			$tempstate = 0;
		}
		
		$sql = "UPDATE lights SET state = $tempstate , time = 0 WHERE id = '$ID'";

		mysql_select_db($db);		
		$retval = mysql_query($sql, $conn);
		if(!$retval) {
			die('could not change light state: ' . mysql_error());		
		}
		else{
			
			$destination .= $file . ".py " . $ID;
			exec($destination);
		}
	}
	
?>
