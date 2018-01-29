<?php

    session_start();
    include('connection.php');

//TODO: add code to check if user exists

    $emailToLogin = '';
    $passToLogin = '';
    $passFromDB = '';
    $passwordsMatch = false;
    $status = '';

    if(!empty($_POST['email']) && !empty($_POST['pass'])){

        $emailToLogin = mysqli_real_escape_string($con, $_POST['email']);
        $passToLogin = mysqli_real_escape_string($con, $_POST['pass']);

    }else{

        die('No se recibieron credenciales de parte del usuario.');
    }


    $sql = "SELECT * FROM tbl_users WHERE email = '$emailToLogin' LIMIT 1";

    $result = mysqli_query($con, $sql);

    if(!$result){

        echo 'ERROR: no se pudo hacer la consulta a la base de datos.';
        exit;
    }

    $results = mysqli_affected_rows($con);


    //TODO: fectch all rows and check pw matching.
    if($results == 1){

        $row = mysqli_fetch_assoc($result);

        $passFromDB = $row['password'];
        $name = $row['name'];
        $status = $row['status'];


        switch($status){

            case 'pending':

                $_SESSION['resendActivationEmail'] = $emailToLogin;
                $_SESSION['name'] = $name;
                echo 'pending';
                break;

            case 'active':

                $passwordsMatch = password_verify($passToLogin, $passFromDB);

                if($passwordsMatch){

                    echo 'success';

                    $_SESSION['sessionActive'] = 'active';

                }else{

                    echo 'su correo o contraseña es incorrecta';
                }
                break;
        }

    }else{

        echo 'Su cuenta no esta registrada en nuestro sistema, verifique los datos ingresados o cree una cuenta
                dando click al boton <strong>Crear cuenta</strong>.';
    }

?>
