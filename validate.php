<?php 

    include 'connection.php';

    $conn = openCon();

    $sql = "SELECT * FROM `user_data` WHERE user_name = ? ";

    

//code start

    $stmt = $conn -> prepare($sql);
   

    if($stmt){

        //prepare and bind

        $name = $_POST['user_name'];
        $pass = $_POST['user_pass'];

        // $name = "sayan";
        // $pass = "1244";

        $stmt -> bind_param("s", $name);

        $stmt -> execute();

        $result = $stmt->get_result();

        // var_dump ($result -> num_rows);

        if($result -> num_rows > 0){

            while ($row = $result -> fetch_assoc() ) {
                
               if (password_verify($pass, $row['user_pass'])){

                      session_start();
                $_SESSION["username"] = $name;
                // $_SESSION["user_id"] = 123;

                if(dynamic_table($name, $conn) === true){

                    //  Sanitize table name
                    if (!preg_match('/^[a-zA-Z0-9_]+$/', $name)) {
                        die("Invalid table name");
                    }

                    //  Inject sanitized table name directly into query

                    $sql_create = "CREATE TABLE `$name` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `full_name` varchar(255) NOT NULL,
                        `email` varchar(255) NOT NULL,
                        `phn_number` varchar(15) NOT NULL,
                        `message` text NOT NULL,
                        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                        PRIMARY KEY (`id`)
                    )";

                     if($conn->query($sql_create) === true){

                        echo "user found successfully and  `$name` table created";
                    }

                    else{

                        echo "user found successfully but table creation failed";
                    }
                

                

                    exit;


                }

                else{
                    echo "user found successfully but table creation failed";
                }

               
               }

                else{

                echo "Password mismatched";

                }

            }

        }else{
            echo "username or password mismatched" . $stmt -> error;
        }

        $stmt -> close();


    }

    function dynamic_table ($table_name, $conn){

        $sql = "SHOW TABLES LIKE '$table_name'";
         $result = $conn->query($sql);

        if($result -> num_rows >0){

            return false;

        }else{

            return true;
        }

    }

   closeCon($conn);

?>