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

    $lockID = $_POST['idNumber'] ;
    $ownerFName = $_POST['oFName'] ;
    $zip = $_POST['zipCode'] ;

   

    $sql = "DROP TABLE $lockID";
    $deleteTable = $conn->query($sql) ;
        
    
    $sql = "DELETE FROM `lock_info` WHERE lock_ID = '".$lockID."' AND o_fname='".$ownerFName."' AND postalCode = '".$zip."'";
          
    $DeleteQuery = $conn->query($sql) ;
      if ( $DeleteQuery == TRUE) {
          header("Location: ../deleteLock.php");  
         }
      else {
          echo "<div style='background-color: white' Error updating record: " . $conn->error."</div>";
         }    
      

?>