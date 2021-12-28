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

    $lock_id = $_GET['lock_id'] ;

    
        if(isset($_POST['area_address'])){

        $sql = "UPDATE lock_info SET `Area`= '".$_POST['area_address']."',
        `Access To`= '". $_POST['l_access']."',
        `contact`= ".$_POST['c_info'].",
        `o_fname`= '".$_POST['o_finfo']."',
        `o_lname`= '".$_POST['o_linfo']."',
         `postalCode`= '".$_POST['p_code']."'
          WHERE `Lock_ID`='".$lock_id."'";
          
        $updateQuery = $conn->query($sql) ;
        if ( $updateQuery == TRUE) {
          header("Location: ../user.php?lock_id=$lock_id");  
            } else {
                echo "<div style='background-color: white' Error updating record: " . $conn->error."</div>";
            }    
      }
      


?>