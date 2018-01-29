<?php

    session_start();
    include('connection.php');
//[x]@TODO: include the connection file


    $name = '';
    $email = '';
    $pass = '';
    $cpass = '';
    $activation_code = '';

    $errors = '';

    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['cPass'])){

        echo 'no $_POST data received';
        exit;
    }else{

        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        if(strlen($name) == ''){

            $errors .= '<p>por favor provea un nombre</p>';
        }


        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

            $errors .= '<p>correo invalido</p>';
        }


        $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
        if(strlen($pass) < 6){

            $errors .= '<p>la contraseña es muy corta.</p>';
        }

        $cpass = filter_var($_POST['cPass'], FILTER_SANITIZE_STRING);
        if(strlen($cpass) < 6){

            $errors .= '<p>la contraseña es muy corta.</p>';
        }


        if($pass !== $cpass){

            $errors .= '<p>Las contraseñas no son iguales.</p>';
        }

    }

    if(!empty($errors)){

        echo $errors;

        exit;
    }

    $name = mysqli_real_escape_string($con, $name);
    $email = mysqli_real_escape_string($con, $email);
    $pass = mysqli_real_escape_string($con, $pass);


    /* hashing password */
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $activation_code = bin2hex(openssl_random_pseudo_bytes(16));


    $sql = "INSERT INTO tbl_users(name, email, password, activation_code, status)
            VALUES('$name', '$email', '$pass', '$activation_code', 'pending')";

    if(!mysqli_query($con, $sql)){

        echo '<div class="alert alert-danger">ocurrio un ERROR: no se pudo completar el registro.<div>';
        exit;
    }else{

        /* ------- SESSION var to reference the email on the next page. -------- */
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;


         /* SENDING ACTIVATION EMAIL TO NEW USER */
        $message = "Gracias por registrarse!
        \nPara poder ingresar al sitio tienes que activar tu cuenta, lo cual puedes hacer dando click al enlace en este correo.\n\n";
        $message .= "pages/confirmEmail.php?email=". urlencode($email) . "&key=$activation_code";
        $sentEmail = mail($email, 'Por favor active su cuenta, ', $message, 'From: '.'do-not-reply@moments.com');

        if(!$sentEmail){
            echo 'failed to send email but the user has been registered';
        }else{
            echo 'success';
        }
    }



?>
