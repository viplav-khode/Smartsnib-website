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
    $accessID = $_POST['accessID'] ;
    $action = $_POST['action'] ;

   
    if($action=='delete'){
        $sql = "DELETE FROM lock_access_relation WHERE `Lock_ID`='".$lockID."' AND `Access_To`='".$accessID."'";
            
        $DeleteQuery = $conn->query($sql) ;
        if ( $DeleteQuery == TRUE) {
            header("Location: ../access_to.php");  
            }
        else {
            echo "<div style='background-color: white' Error updating record: " . $conn->error."</div>";
            }    
        }
        
    if($action=='add')
    {
        $sql = "INSERT INTO `lock_access_relation`(`Lock_ID`, `Access_ID`) VALUES ('".$lockID."', '".$accessID."')";
    
        $InsertQuery = $conn->query($sql) ;
        if ( $InsertQuery == TRUE) {
            header("Location: ../access_to.php");  
            }
        else {
            echo "<div style='background-color: white' Error updating record: " . $conn->error."</div>";
            }  

    }


    if($action== '0')
    {
             header("Location: ../access_to.php");  
    
    }


?>