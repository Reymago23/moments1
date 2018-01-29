<?php

    session_start();
    include('connection.php');

    $emailentered = '';

    if(!empty($_POST['emailEntered'])){

        $emailentered = mysqli_real_escape_string($con, $_POST['emailEntered']);


        $sql = "SELECT * FROM tbl_users WHERE email = '$emailentered' LIMIT 1";

        $resultSet = mysqli_query($con, $sql);

        if(!$resultSet){

            echo 'ERROR! no se pudo hacer la consulta.';
            exit;
        }

        if(mysqli_affected_rows($con) == 1){

            echo "it's registered";

            $_SESSION['email'] = $emailentered;

        }else{

            echo "it's not registered";
        }
    }

?>
