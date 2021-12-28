<?php


    $server 	= "localhost";	// Change this to correspond with your database port
    $username 	= "id17819145_viplav";			// Change if use webhost online
    $password 	= "Cvpp@12345678910";
    $DB 		= "id17819145_smartsnib";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }

    $lockID = $_GET['idNumber'] ;
    $sql = "CREATE TABLE $lockID (Sr BIGINT(255) NOT NULL AUTO_INCREMENT, Temperature VARCHAR(100), 
            Humidity VARCHAR(100), TimeStamp timestamp(6), PRIMARY KEY (Sr)) ";
    
    $createTable = $conn->query($sql) ;
        
    
   

?>