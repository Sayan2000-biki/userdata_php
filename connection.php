<?php 

function openCon(){

    $servername = "localhost";
    $username = "u366674963_Namrata";
    // $username = "root";

    $password = "Nams@2000";
    $db_name = "u366674963_data_db";
    // $db_name = "contact_db";

   

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    

     return $conn; // ✅ Return the connection

}

function CloseCon($conn) {
  $conn -> close();
}


?>