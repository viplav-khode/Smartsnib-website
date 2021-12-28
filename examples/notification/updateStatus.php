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

    $lockID = $_GET['lock_id'] ;

    $sql = "UPDATE `casualty` SET `solved`= 1 WHERE lock_id='$lockID' ";
          
         $InsertQuery = $conn->query($sql) ;
            if ( $InsertQuery == TRUE) {
            header("Location: ../notifications.php");  
                } else {
                    echo "<div style='color:black'> Error updating record: " . $conn->error."</div>";
                }    
      

?>