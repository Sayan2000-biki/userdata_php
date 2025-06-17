<?php 

    include 'connection.php';

    $conn = openCon();

    $sql = "SELECT * FROM `user_data` WHERE user_name = ? ";

    

//code start

 session_start();

  if(isset($_SESSION['username'])){

   $table_name = $_SESSION['username'];

  }


$sql = "SELECT * FROM `$table_name` ";

$results = $conn -> query($sql);

$data = array();

if ($results === false) {

    http_response_code(500);
    echo json_encode(["error" => "Query failed: " . $conn->error]);

} elseif ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()) {
        $data[] = $row;
    }
}



         header('Content-Type: application/json');

        // Output data in JSON format

        echo json_encode($data);

       

    closeCon($conn);


?>