<?php

    include 'connection.php';

    $conn = openCon();

    $sql = "SELECT * FROM `user_data` WHERE user_name = ? ";

    

//code start

session_start();

  if(isset($_SESSION['username'])){

   $table_name = $_SESSION['username'];

  }

$sql = "INSERT INTO `$table_name` (`full_name`, `email`, `message`, `phn_number`) VALUES (?, ?, ?, ?)";

// Prepare and bind
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Get POST data
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $msg = $_POST['message'];
    $phn = $_POST['phn_number'];


    $stmt->bind_param("sssi", $name, $email, $msg, $phn);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Execute error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Prepare error: " . $conn->error;
}

closeCon($conn);

?>
