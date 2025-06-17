<?php 

    include 'connection.php';

    $conn = openCon();

    $sql = "SELECT * FROM `user_data` WHERE user_name = ? ";

    

//code start

 session_start();

  if(isset($_SESSION['username'])){

   $table_name = $_SESSION['username'];

  }

$sql = "UPDATE `$table_name` SET `full_name` = ?, `email` = ? WHERE `id` = ? ";

$stmt = $conn -> prepare($sql);

if($stmt){

    $up_name = $_POST['update_name'];
    $up_email = $_POST['update_email'];

    $up_id = $_POST['formId'];

    $stmt -> bind_param("ssi", $up_name, $up_email, $up_id);

    $stmt -> execute();

    if ($stmt->affected_rows>0) {
        echo "Data updated successfully";
    }

    else{
        echo $stmt -> error;
    }


}

closeCon($conn);







?>