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
    $accessName = $_POST['aName'] ;
    $contactNO = $_POST['cNumber'] ;
    $ownerFName = $_POST['oFName'] ;
    $ownerLName = $_POST['oLName'] ;
    $areaAddress = $_POST['areaAddress'] ;
    $zip = $_POST['zipCode'] ;

   
   
       
    
    $sql = " INSERT INTO `lock_info`(`Lock_ID`, `Area`, `Access_To`, `contact`, `o_fname`, `o_lname`, `postalCode`) 
    VALUES ('".$lockID."' , '".$areaAddress."', '".$accessName."', $contactNO, '".$ownerFName."', '".$ownerLName."', '".$zip."'); ";
          
         $InsertQuery = $conn->query($sql) ;
            if ( $InsertQuery == TRUE) {
            header("Location: ../tables.php");  
                } else {
                    echo "<div style='color:black'> Error updating record: " . $conn->error."</div>";
                }    
      

?>