<?php
    
    $server 	= "localhost";	// Change this to correspond with your database port
    $username 	= "id17819145_viplav";			// Change if use webhost online
    $password 	= "Cvpp@12345678910";
    $DB 		= "id17819145_smartsnib";
  

    // Create connection
    $conn = new mysqli($server, $username, $password, $DB) ;
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error) ;
    }

    
    $query = "SELECT * from casualty" ;
    $run_query =  $conn->query($query) ;
   // $lock_info = ;

  //  $count = array("data count"=> 0);
    $count = 0;

    while($row =  $run_query->fetch_assoc())
    {
        if($row['flag'] == '0')
        $count++;
    }

    
    echo $count ;
   // echo json_encode($count);
  
?>