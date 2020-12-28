<?php 
    $servername = "46.59.18.164:3306"; #46.59.18.164 #localhost
    $username = "ruski";
    $password = "hund";
    $dbname = "computerparts";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
    }
    else{
        echo "database connected! :D";
    }

?>