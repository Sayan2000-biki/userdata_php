<?php 

function openCon(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "contact_db";

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