<?php 



function openCon(){

    $servername = "localhost";
    $username = "u366674963_sayan_user";
    //$username = "root"
    $password = "Nams@2000";
    // $password = "";
    $db_name = "u366674963_sayan_db";
    //$db_name = "contact_db"
    

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