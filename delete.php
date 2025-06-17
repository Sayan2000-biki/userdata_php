<?php 

include 'connection.php';

 $conn = openCon();


//code start

 session_start();

  if(isset($_SESSION['username'])){

   $table_name = $_SESSION['username'];

  }

$sql = "DELETE FROM `$table_name` WHERE id = ?";

$stmt = $conn -> prepare($sql);

if($stmt){

    $item = $_POST['item'];

    $stmt -> bind_param("s", $item);

    $stmt -> execute();

    if ($stmt -> affected_rows > 0) {
        echo "data deleted successfully";
    }

    else {
        echo "error" . $stmt -> error;
    }
}

closeCon($conn);


?>