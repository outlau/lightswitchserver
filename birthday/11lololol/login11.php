<?php		
 define('DBHOST', 'localhost');
 define('DBUSER', 'root');
 define('DBPASS', 'tupac21');
 define('DBNAME', 'myDB');
 
 $conn = mysql_connect(DBHOST,DBUSER,DBPASS,DBNAME);
 //$db = mysql_select_db(DBNAME);
		
	// Check connection
	if (!$conn) {
	    die("Connection failed: " . $conn->connect_error);
	}

			$user = "hi";
			$password = "johnson";
			$checkuser = mysql_query("SELECT username FROM accounts WHERE username = '$user'");
			if (mysql_fetch_row($checkuser))
			{
				
				echo "username taken";	
			}
			else {
				$sql = "INSERT INTO accounts (username, password)
				VALUES ('$user','$password')";
				if (mysql_query($sql, $conn)){				
					echo "success" ;	
					header("Location:index.php");			
				
				}			
			}
	
?>
