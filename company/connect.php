<?php 
	$connection = mysqli_connect('localhost','username','password','db_name');
	if(!$connection){
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysql_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysql_connect_error() . PHP_EOL;
		exit();
	}
