<?php
    header('Content-type: text/javascript') ;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sensor";


    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT Temperature FROM temp_hum LIMIT 12";
    $result = $conn->query($sql);

    $json = array() ; 
    $i=0;   
    if ($result->num_rows > 0) {

     while($row = $result->fetch_assoc()) {
        $json[$i] = $row['Temperature'] ;     
        $i++ ;   
     }
   }

 /*   $json = array(
        0 => 10,
        1 => 10,
        2 => 10,
        3 => 10,
        4 => 10,
        5 => 10,
        6 => 60,
        7  => 75,
        8 => 60,
        9  => 90,
        10 => 80,
        11  => 110,
    ) ;*/

    echo json_encode($json);

?>