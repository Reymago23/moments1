<?php

    session_start();
    include('connection.php');


    if(empty($_SESSION['email']) || empty($_SESSION['auth_code']) || empty($_POST['newPass'])){

        echo 'ERROR: lo sentimos, ha ocurrido un error.';
        exit;
    }


    $email = $_SESSION['email'];
    $auth_code = $_SESSION['auth_code'];
    $newPass = mysqli_real_escape_string($con, $_POST['newPass']);


    // checking if the email exists, and the auth code matches.
    $sql = "SELECT * FROM tbl_resetPW WHERE email = '$email' AND auth_code = '$auth_code'
            AND code_status = 'pending' LIMIT 1";


    $ResultSet = mysqli_query($con, $sql);

    if(!$ResultSet){

        echo 'ERROR: no se pudo conectar a la base de datos, por favor intente mas tarde.';
        exit;
    }

    if(mysqli_affected_rows($con) == 1){

        $newPass = password_hash($newPass, PASSWORD_DEFAULT);

        $sql = "UPDATE tbl_users SET password = '$newPass' WHERE email = '$email' AND status = 'active'";

        $ResultSet = mysqli_query($con, $sql);

        if(!$ResultSet){

            echo 'ERROR: no se pudo actualizar la contraseña, por favor intente mas tarde.';
            exit;
        }

        if(mysqli_affected_rows($con) == 1){

            $sql = "UPDATE tbl_resetPW SET code_status = 'USED' WHERE email = '$email' AND
                        auth_code = '$auth_code' LIMIT 1";

            $ResultSet = mysqli_query($con, $sql);

            echo 'success';
        }


    }else{

        echo 'ERROR: no se encontro informacion que actualizar, en la base de datos.';
    }





?>
