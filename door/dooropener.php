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
	$updateStateAndroid = $_GET['request'];
		
	$updateState = $_GET['updateState'];
	$getState = $_GET['getState'];	
	
	if($updateStateAndroid){
		
		if($updateStateAndroid != 'true' && $updateStateAndroid != 'false'){
			$getState = 'active';
			$updateStateAndroid = null;	
		}
		else{
			
		}
	}
	
	$curTime = time();	

	
	$sql = "SELECT `timestamp` FROM `lock` WHERE id = 'frontdoor'";
	
	mysql_select_db($db);		
	$retval = mysql_query($sql, $conn);
	if(!$retval) {
		die('could not change light state: ' . mysql_error());		
	}
	else{
		
		if($getState){	
			$sql = "SELECT islocked FROM `lock` WHERE id = 'frontdoor'";//"SELECT 'islocked' FROM 'lock' WHERE 'id' = 'frontdoor'"; //`lock` SET `id`='frontdoor',`islocked`=$state WHERE 1";
		
			mysql_select_db($db);		
			$retval = mysql_query($sql, $conn);
			if(!$retval) {
				die('could not change light state: ' . mysql_error());		
			}
			else{
				$row = mysql_fetch_assoc($retval);
				echo $row['islocked'];		
			}		
				
		}
		else{
	
			$timestamp = mysql_fetch_assoc($retval)['timestamp'];
			
			//greater than 3 seconds?? before new query
			if(time() - $timestamp > 3){
	
				
				if($updateState || $updateStateAndroid == 'true' || $updateStateAndroid == 'false' ) {
				
					
					$state = 0;
					
					if ($updateState == 'true' || $updateStateAndroid == 'true'){
						$state = 1;
					}
					else if ($updateState == 'false' || $updateStateAndroid == 'false'){
						$state = 0;
					}
					else {
						die("invalid get input");
					}
					echo $state;
					
					$sql = "UPDATE `lock` SET islocked = '$state',timestamp = '$curTime' WHERE id = 'frontdoor'";// ;// WHERE 1";
				
					mysql_select_db($db);		
					$retval = mysql_query($sql, $conn);
					if(!$retval) {
						die('could not change light state: ' . mysql_error());		
					}
					
					else{
						$file = "sudo -u root python /var/www/html/door/dooropener.py";
						echo "success";
						$destination = $file . " " . $state;
						exec($destination);
					
					}
				}
			}
			else{
				echo 2;		
			}
		}
	}
?>