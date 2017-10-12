<?php
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', 'tupac21');
	define('DBNAME', 'myDB');
	
	$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
	$db = mysql_select_db(DBNAME);
		
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . $conn->connect_error);
	    echo "Connection failed";
	}
	
	$destination = 'sudo -u root python /var/www/html/';
	
	$time = $_GET['time'];
	$state = $_GET['state'];
	$ID = $_GET['ID'];
	
	if(!$time && !$state){
		
		if ($res = mysql_query("SELECT id, time, stateAtTime FROM lights WHERE id = '$ID'")){
			
			while($row =mysql_fetch_array($res)){
	
				echo $row["id"] ."/" .$row["time"] . "/" .$row["stateAtTime"] ;
			
			}
		}
		
	}
	else{
		
		echo $time . "    " . $state . "    " .$ID;
		
		$sql = "UPDATE lights SET time = '$time', stateAtTime = '$state' WHERE id = '$ID'";
	
		mysql_select_db($db);		
		$retval = mysql_query($sql, $conn);
		if(!$retval) {
			die('could not change light state: ' . mysql_error());		
		}
	}

?>