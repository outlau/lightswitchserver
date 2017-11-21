<?php
	define('DBHOST', 'localhost');
	define('DBUSER', 'admin');
	define('DBPASS', 'tupac21');
	define('DBNAME', 'myDB');
	
	$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);
		
	$mysqli->select_db(DBNAME) or die("cannot connect to database : " . $db->connect_error);
	
	$destination = 'sudo -u root python /var/www/html/lights/';
	$getURL = $_GET['request'];
	
	
	list($file, $ID) = explode("/",$getURL);
	
	
	if($file == "refresh"){
		$sql = "SELECT * FROM lights";
	
		$result = $mysqli->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo $row["id"] ."/" .$row["state"] . "/"; //.$row["time"] . "/";
			}
		} else {
			echo "0 results";
		}
		$mysqli->close();
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
		$result = $mysqli->query($sql);
		$mysqli->close();
		
		if(!$result) {
			die('could not change light state: ' . mysql_error());		
		}
		else{	
			$destination .= $file . ".py " . $ID;
			exec($destination);
		}	
	}
?>
