<?php
    header('Content-type: text/javascript') ;

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

    $lock_id = $_GET['lock_id'] ;

    $query = "SELECT * from $lock_id ORDER BY TimeStamp DESC LIMIT 1 " ;
    $run_query =  $conn->query($query);
    $status = $run_query->fetch_assoc();

    echo $status['Temperature'];

?>