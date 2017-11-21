<?php
	define('DBHOST', 'localhost');
	define('DBUSER', 'admin');
	define('DBPASS', 'tupac21');
	define('DBNAME', 'myDB');
	
	$mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DBNAME);
		
	$mysqli->select_db(DBNAME) or die("cannot connect to database : " . $db->connect_error);
	
	$destination = 'sudo -u root python /var/www/html/';
	
	$time = $_GET['time'];
	$state = $_GET['state'];
	$ID = "Lights";//;$_GET['ID'];
	
	if(!$time && !$state){
		
		
		$sql = "SELECT id, time, stateAtTime FROM lights WHERE id = '$ID'";
	
		$result = $mysqli->query($sql);
		
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo $row["id"] ."/" .$row["time"] . "/" .$row["stateAtTime"] ;
			}
		} else {
			echo "0 results";
		}
		$mysqli->close();	
	}
	else{
		
		echo $time . "    " . $state . "    " .$ID;
		
		$sql = "UPDATE lights SET time = '$time', stateAtTime = '$state' WHERE id = '$ID'";
		$result = $mysqli->query($sql);
		$mysqli->close();	
		$retval = mysql_query($sql, $conn);
		if(!$result) {
			die('could not change light state: ' . mysql_error());		
		}
	}

?>
