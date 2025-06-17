<?php 

    include 'connection.php';

    $conn = openCon();

    $sql = "SELECT * FROM `user_data` WHERE user_name = ? ";

    

//code start

$sql = "INSERT INTO `user_data` (`user_name`, `user_pass`, `user_phn` )
 VALUES (?,?,?)";

 $sql2 = "SELECT * FROM `user_data`  WHERE BINARY user_name = ? ";

 // Prepare and bind
$stmt = $conn->prepare($sql);
$stmt2 = $conn -> prepare($sql2);

 //bind_param

 $name = $_POST['user_name'];

$pass = $_POST['user_pass'];
$phn  = $_POST['user_phn'];

$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

//execute
 $stmt2 -> bind_param("s", $name );

 $stmt2 -> execute();

 $result = $stmt2 -> get_result();

//  var_dump($result);

 if($result -> num_rows > 0){

    echo "username already in used";

    exit();
 }

 else{

     $stmt -> bind_param("ssi", $name,$hashed_password,$phn);

        if($stmt -> execute()){
            
            echo "New record created successfullly";
            
        }else{
            echo "error" . $stmt -> error;
        }

        $stmt -> close();
 }


//  if($stmt){

      
      

       
//  }

//  else{
//      echo "Prepare error: " . $conn->error;
//  }


closeCon($conn);








?>