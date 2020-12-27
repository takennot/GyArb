<?php 
	$servername = "46.59.18.164"; #46.59.18.164 #localhost
	$username = "rus";
	$password = "Computer123";
	$dbname = "computerparts";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}
	else{
		echo "database connected! :D"
	}

?>