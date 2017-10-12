<?php
	
	$getURL = $_GET['request'];
	
	list($sumOne, $sumTwo) = explode("/",$getURL);
	
	
	$file = "calculate.py " . $sumOne . " " . $sumTwo;
	
	echo $file;
	exec($file);
	
?>